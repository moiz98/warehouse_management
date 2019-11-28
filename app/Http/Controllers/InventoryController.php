<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Products;
use DB;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:employee');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$inventory = Inventory::all();
        $inventory = DB::table('inventories')
            ->join('products', 'products.id', '=', 'inventories.product_id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('suppliers', 'products.supplier_id', '=', 'suppliers.id')
            ->select('inventories.*', 'products.Product_name', 'products.Product_unit_price', 'categories.Category_name','suppliers.Supplier_first_name', 'suppliers.Supplier_last_name')
            ->get();
        return view('inventory.index')->with('inventory', $inventory);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Products::all();
        return view('inventory.create')->with('products', $products);
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
            'product_id' => 'required',
            'retailprice' => 'required',
            'unitsinstock' => 'required',
            'location' => 'required',
        ]);
        
        $inventory = new Inventory;
        $inventory->product_id = $request->input('product_id');
        $inventory->Retail_price = $request->input('retailprice');
        $inventory->units_in_stock = $request->input('unitsinstock');
        $inventory->units_in_order = 0;
        $inventory->location = $request->input('location');
        $inventory->reorder = 0;
        $inventory->save();
        
        return redirect('/inventory')->with('success', 'Product Added in Inventory');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventory = Inventory::find($id);
        $product = Products::find($inventory->product_id);
        return view('inventory.show')->with('inventory', $inventory)->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventory = Inventory::find($id);
        return view('inventory.edit')->with('inventory',$inventory);
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
            'retailprice' => 'required',
            'unitsinstock' => 'required',
            'unitsinorder' => 'required',
            'location' => 'required',
        ]);
        
        $inventory = Inventory::find($id);
        $inventory->Retail_price = $request->input('retailprice');
        $inventory->units_in_stock = $request->input('unitsinstock');
        $inventory->units_in_order = $request->input('unitsinorder');
        $inventory->location = $request->input('location');
        $inventory->reorder = 0;
        $inventory->save();
        
        return redirect('/inventory')->with('success', 'Product Updated in Inventory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventory = Inventory::find($id);
        $inventory->delete();
        return redirect('/inventory')->with('success', 'Product Removed From Inventory');
    }
}
