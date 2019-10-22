<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class EmployeeLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:employee', ['except' => ['logout']]);
    }
    public function ShowLoginForm()
    {
        return view('auth.employee-login');
    }
    public function login(Request $request)
    {
        //validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        //Attempt to log the user in
        if(Auth::guard('employee')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            //if successful, then redirect to their intended location
            return redirect()->intended(route('employee.dashboard'));
        }
    
        //if unsuccessful, then redirect back to login with form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    public function logout()
    {
        Auth::guard('employee')->logout();
        return redirect('/');
    }
}
