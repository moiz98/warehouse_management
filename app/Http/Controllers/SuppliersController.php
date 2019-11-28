<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suppliers;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $suppliers = Suppliers::all();
        return view('Suppliers.index')->with('suppliers', $suppliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'company' => 'required'
        ]);
        
        $supplier = new Suppliers;
        $supplier->Supplier_first_name = $request->input('fname');
        $supplier->Supplier_last_name = $request->input('lname');
        $supplier->Supplier_phone = $request->input('phone');
        $supplier->Supplier_email = $request->input('email');
        $supplier->Supplier_Company = $request->input('company');
        $supplier->save();
        
        return redirect('/suppliers')->with('success', 'Supplier Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = Suppliers::find($id);
        return view('Suppliers.show')->with('supplier',$supplier);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Suppliers::find($id);
        return view('Suppliers.edit')->with('supplier', $supplier);
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
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required',
            'company' => 'required'
        ]);
        
        $supplier = Suppliers::find($id);
        $supplier->Supplier_first_name = $request->input('fname');
        $supplier->Supplier_last_name = $request->input('lname');
        $supplier->Supplier_phone = $request->input('phone');
        $supplier->Supplier_Company = $request->input('company');
        $supplier->save();
        
        return redirect('/suppliers')->with('success', 'Supplier Added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Suppliers::find($id);
        $supplier->delete();
        return redirect('/suppliers')->with('success', 'Supplier Removed');
    }
}
