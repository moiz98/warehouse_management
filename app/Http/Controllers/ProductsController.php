<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Suppliers;
use App\Products;
use App\Inventory;
use DB;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin',['except' => ['index', 'show', 'cat_page']]);
    }

    public function index()
    {
        $products = Products::orderBy('created_at', 'desc')->paginate(9);
        $category = Category::all();
        $inventory = Inventory::all();
        return view('products.index')->with('inventory', $inventory)->with('category', $category)->with('products', $products);
    }
    public function cat_page($id)
    {
        $products = Products::where('category_id', $id )->paginate(9);
        $category = Category::all();
        $ccc = Category::find($id);
        $inventory = Inventory::all();
        return view('prodcatpage')->with('inventory', $inventory)->with('ccc', $ccc)->with('category', $category)->with('products', $products);
    }
    public function adminindex()
    {
        $products = Products::all();
        return view('adminindex')->with('products', $products);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $supplier = Suppliers::all();
        return view('products.create')->with('category', $category)->with('supplier', $supplier);
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
            'name' => 'required',
            'Description' => 'required|string',
            'weight' => 'required',
            'UnitType' => 'required',
            'Category' => 'required',
            'Supplier' => 'required',
            'price' => 'required',
            'coverimg' => 'image|nullable|max:1999'
        ]);
        
        //handle file upload
        if ($request->hasFile('coverimg'))
        {
            //get filename with extention
            $FileNameWithExt = $request->file('coverimg')->getClientOriginalName();
            //get filename only
            $FileName = pathinfo($FileNameWithExt, PATHINFO_FILENAME);
            //get extention only
            $extension = $request->file('coverimg')->getClientOriginalExtension();
            //filename to store
            $FileNameToStore = $FileName.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('coverimg')->storeAs('public/cover_images', $FileNameToStore);
        }
        else 
        {
            $FileNameToStore = 'noimage.jpg';
        }
        
        
        $product = new Products;
        $product->Product_name = $request->input('name');
        $product->Product_Description = $request->input('Description');
        $product->Product_unit_weight = $request->input('weight');
        $product->Product_unit_type = $request->input('UnitType');
        $product->Product_unit_price = $request->input('price');
        $product->category_id = $request->input('Category');
        $product->supplier_id = $request->input('Supplier');
        $product->cover_img = $FileNameToStore;
        $product->save();
        
        return redirect('/admin')->with('success', 'Product Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::find($id);
        $category = Category::all();
        return view('products.show')->with('category', $category)->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);
        $category = Category::all();
        $supplier = Suppliers::all();
        return view('products.edit')->with('product',$product)->with('category', $category)->with('supplier', $supplier);
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
            'name' => 'required',
            'Description' => 'required',
            'weight' => 'required',
            'UnitType' => 'required',
            'price' => 'required'
        ]);
        
        $product = Products::find($id);
        $product->Product_name = $request->input('name');
        $product->Product_Description = $request->input('Description');
        $product->Product_unit_weight = $request->input('weight');
        $product->Product_unit_type = $request->input('UnitType');
        $product->Product_unit_price = $request->input('price');
        $product->save();
        
        return redirect('/admin')->with('success', 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        $product->delete();
        return redirect('/admin')->with('success', 'Product Removed');
    }
}
