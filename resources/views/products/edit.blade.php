@extends('layouts.app')

@section('content')
    <h1>Edit Product</h1>
    <form action="{{ route('Products.update',$product->id) }}" method="POST">
        {{ csrf_field() }}            
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" value="{{ $product->name }}" name="name" placeholder="Product Name here"/>
        </div>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea class="form-control" name="Description" id='article-ckeditor' cols="30" rows="10" placeholder="Detail">{{ $product->Description }}></textarea>
        </div>
        <div class="form-group">            
            <label for="weight">Unit Weight</label>
            <input type="text" class="form-control" value="{{ $product->unit_weight }}" name="weight" placeholder="unit weight here"/>
        </div>
        <div class="form-group">
            <label for="UnitType">Unit Type</label>
            <select class="form-control" name="UnitType">
                <option value="" selected>select Unit</option>
                <option value="mg" @if ($product->unit_type == 'mg') selected="selected" @endif>MilliGrams(mg)</option>
                <option value="g" @if ($product->unit_type == 'g') selected="selected" @endif>Grams(g)</option>
                <option value="kg" @if ($product->unit_type == 'kg') selected="selected" @endif>Kilograms(kg)</option>
                <option value="item" @if ($product->unit_type == 'item') selected="selected" @endif>item</option>
                <option value="litre" @if ($product->unit_type == 'litre') selected="selected" @endif>litre</option>
            </select>
        </div>    
        <div class="form-group">
            <label for="Category">Category</label>
            <select class="form-control" name="Category">
                <option value="" selected>select Category</option>
                @foreach ($category as $cat)
                    <option value="{{$cat->id}}" @if ($cat->id == $class->cat->id) selected="selected" @endif>{{$cat->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
                <label for="Supplier">Supplier</label>
                <select class="form-control" name="Supplier">
                    <option value="" selected>select Supplier</option>
                    @foreach ($supplier as $sup)
                <option value="{{$sup->id}}">{{$sup->first_name}} {{$sup->last_name}}</option>
                    @endforeach
                </select>
            </div>
        <div class="form-group">            
            <label for="price">Unit Price</label>
            <input type="text" class="form-control" value="{{$product->unit_price}}" name="price" placeholder="$$$$"/>
        </div>
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
@endsection