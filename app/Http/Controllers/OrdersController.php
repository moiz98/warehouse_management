<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\orders;
use App\order_details;
use App\User;
use App\Inventory;
use DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Orders::all();
        return view('cart')->with('orders', $orders);
    }
    public function cart($id)
    {
        $orders = DB::table('carts')
            ->join('orders', 'orders.cart_id', '=', 'carts.id')
            ->join('order_details', 'order_details.order_id', '=', 'orders.id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->join('inventories', 'products.id', '=', 'inventories.product_id')
            ->select('carts.*', 'orders.Total_Amount', 'products.Product_name', 'order_details.Price', 'order_details.Quantity')
            ->get();
        $total_amount = 0;    
        if ($orders)
        {
            foreach ($orders as $order) 
            {
                $total_amount = $order->Total_Amount;
            }
        }    
        
        return view('cart')->with('total_amount', $total_amount)->with('orders', $orders)->with('id',$id);
    }
    public function createOrder($user_id, $product_id)
    {
        $user = User::find($user_id);
        $inventory = DB::table('products')
            ->join('inventories', 'products.id', '=', 'inventories.product_id')
            ->select('products.*', 'inventories.Retail_price')
            ->get();
        foreach ($inventory as $item)
        {
            if ($item->id = $product_id) 
            {
                $product = $item;
            }
        }
        // if order already exist then add into cart with order details update only 
        $ord = orders::where('cart_id', '=', $user->cart->id)->get()->first();
        if ($ord) 
        {
            $order = orders::find($ord->id);  
        } else 
        {
            $order = orders::create([
                'user_id' => $user->id,
                'cart_id' => $user->cart->id,
                'payment_id' => $user->payment->id,
                'status' => "justCart",
                'Total_Amount' => 0,
            ]);
        }

        $order_details = new order_details;
        $order_details->order_id = $order->id;
        $order_details->product_id = $product_id;
        $order_details->Quantity = 1;  //at the moment ask user later
        $order_details->Price = $product->Retail_price * $order_details->Quantity;
        $order_details->save();
        if ($ord) 
        {
            $order->Total_Amount = $ord->Total_Amount + $order_details->Price;
            $order->save();
        }
        else 
        {
            $order->Total_Amount = $order_details->Price;
            $order->save();
        }
        
        return redirect('/cart/{{$user_id}}')->with('success', 'Product Added');
    }
    public function placeOrder($cart_id)
    {
        $order = orders::where('cart_id', '=', $cart_id)->get()->first();

        //removes cart_id from orders table
        $order->cart_id = NULL;
        //updates stock in inventory
        $orderDetails = order_details::where('order_id', '=', $order->id)->get();
        $inventory = Inventory::all();
        foreach ($orderDetails as $item) {
            $inv_prod = $inventory->where('product_id', '=', $item->product_id)->first();
            if ($inv_prod->units_in_stock > 0)
            {
                $inv_prod->units_in_stock = $inv_prod->units_in_stock - 1;
                $inv_prod->save();
            }
            else
            {
                # code...
            }
            
            
        } 
        //updates order status to processing
        $order->status = "processing";
        $order->save();
        return redirect('/home')->with('success', 'Your Order Is Processing');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
