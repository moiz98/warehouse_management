@extends('layouts.app')

@section('content')
    <h1>Add Product</h1>
    <form method="post" action="{{ route('inventory.store') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="product_id">Product</label>
            <select class="form-control" name="product_id">
                <option value="" selected>select Product</option>
                @foreach ($products as $product)
                    <option value="{{$product->id}}">{{$product->Product_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="retailprice">Retail Price</label>
            <input type="text" class="form-control" name="retailprice" placeholder="Product Retail Price"/>
        </div>
        <div class="form-group">            
            <label for="unitsinstock">Units</label>
            <input type="text" class="form-control" name="unitsinstock" placeholder="Product units for Stock"/>
        </div>
        <div class="form-group">            
            <label for="location">Location</label>
            <input type="text" class="form-control" name="location" placeholder="Location in Warehouse"/>
        </div>
        
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
@endsection
