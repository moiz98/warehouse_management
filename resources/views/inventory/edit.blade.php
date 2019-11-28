@extends('layouts.app')

@section('content')
    <h1>Add Product</h1>
    <form action="{{ route('inventory.update',$inventory->id) }}" method="POST">
        {{ csrf_field() }}
        {{-- <div class="form-group">
            <label for="product_id">Product</label>
            <select class="form-control" name="product_id">
                <option value="" selected>select Product</option>
                @foreach ($products as $product)
                    <option value="{{$product->id}}">{{$product->Product_name}}</option>
                @endforeach
            </select>
        </div> --}}
        <div class="form-group">
            <label for="retailprice">Retail Price</label>
            <input type="text" class="form-control" value="{{$inventory->Retail_price}}" name="retailprice" placeholder="Product Retail Price"/>
        </div>
        <div class="form-group">            
            <label for="unitsinstock">Units</label>
            <input type="text" class="form-control" value="{{$inventory->units_in_stock}}" name="unitsinstock" placeholder="Product units for Stock"/>
        </div>
        <div class="form-group">            
            <label for="unitsinorder">Units Ordered</label>
            <input type="text" class="form-control" value="{{$inventory->units_in_order}}" name="unitsinorder" placeholder="Product units reordered for Stock"/>
        </div>
        <div class="form-group">            
            <label for="location">Location</label>
            <input type="text" class="form-control" value="{{$inventory->location}}"name="location" placeholder="Location in Warehouse"/>
        </div>
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">    
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
@endsection
