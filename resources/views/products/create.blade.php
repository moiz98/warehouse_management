@extends('layouts.app')

@section('content')
    <h1>Add new Products</h1>
    <form method="post" action="{{ route('Products.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">            
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Product Name here"/>
        </div>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea class="form-control" name="Description" id='article-ckeditor' cols="30" rows="10" placeholder="Product Description"></textarea>
        </div>
        <div class="form-group">            
            <label for="weight">Unit Weight</label>
            <input type="text" class="form-control" name="weight" placeholder="unit weight here"/>
        </div>
        <div class="form-group">
            <label for="UnitType">Unit Type</label>
            <select class="form-control" name="UnitType">
                <option value="" selected>select Unit</option>
                <option value="mg">MilliGrams(mg)</option>
                <option value="g">Grams(g)</option>
                <option value="kg">Kilograms(kg)</option>
                <option value="item">item</option>
                <option value="litre">litre</option>
            </select>
        </div>    
        <div class="form-group">
            <label for="Category">Category</label>
            <select class="form-control" name="Category">
                <option value="" selected>select Category</option>
                @foreach ($category as $cat)
                    <option value="{{$cat->id}}">{{$cat->Category_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
                <label for="Supplier">Supplier</label>
                <select class="form-control" name="Supplier">
                    <option value="" selected>select Supplier</option>
                    @foreach ($supplier as $sup)
                        <option value="{{$sup->id}}">{{$sup->Supplier_first_name}} {{$sup->Supplier_last_name}}</option>
                    @endforeach
                </select>
            </div>
        <div class="form-group">            
            <label for="price">Unit Price</label>
            <input type="text" class="form-control" name="price" placeholder="$$$$"/>
        </div>
        <div class="form-group">
            <label for="coverimg">Product Image</label>
            <input type="file" class="form-control" name="coverimg"/>
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
@endsection
