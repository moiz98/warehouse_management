<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Address;
use App\cart;
use App\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;
use Mail;
use App\Mail\verifyEmail;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:12',
            'house' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //dd($data);
        Session::flash('success','Registered! Verify Your Email To Activate Your Account');
        $user = User::create([
            'first_name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'last_name' => $data['lastname'],
            'phone' => $data['phone'],
            'verifyToken' => Str::random(40),
        ]);
        
        $address = new Address;
        $address->address_type = "Billing";
        $address->House = $data['house'];
        $address->City = $data['city'];
        $address->Province = $data['state'];
        $address->Country = $data['country'];
        $address->user_id = $user->id;
        $address->save();
        $address1 = new Address;
        $address1->address_type = "Shipping";
        $address1->House = $data['house'];
        $address1->City = $data['city'];
        $address1->Province = $data['state'];
        $address1->Country = $data['country'];
        $address1->user_id = $user->id;
        $address1->save();
        $cart = new cart;
        $cart->user_id = $user->id;
        $cart->save();
        $payment = new Payment;
        $payment->payment_Type = "COD";
        $payment->user_id = $user->id;
        $payment->save();
        $thisUser = User::findOrFail($user->id);
        $this->SendEmail($thisUser);
        return $user;
    }
    public function SendEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }

    public function verifyEmailfirst()
    {
        return view('email.verifyEmailfirst');
    }

    public function sendEmailDone($email,$verifyToken)
    {
        $user = User::where(['email'=>$email,'verifyToken'=>$verifyToken])->first();
        if($user)
        {
            return User::where(['email'=>$email,'verifyToken'=>$verifyToken])->update(['status'=>'1','verifyToken'=>NULL]);
        }
        else
        {
            return 'User not found';
        }
    }
}
