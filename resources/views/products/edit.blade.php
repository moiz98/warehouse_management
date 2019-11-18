{{-- @extends('layouts.app')

@section('content')
    <h1>Add new Products</h1>
    <form method="post" action="{{ route('Products.store') }}">
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
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
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
            <input type="text" class="form-control" name="price" placeholder="$$$$"/>
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
@endsection --}}

<h1>Edit Product</h1>
<form action="{{ route('Products.update',$product->id) }}" method="POST">
        <div class="form-group">
        @method('PUT')
        @csrf          
            <label for="title">Title</label>
            <input type="text" class="form-control" value="{{ $post->title }}" name="title" placeholder="Title"/>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea id="article-ckeditor" class="form-control" name="body" cols="30" rows="10" placeholder="Detail">{{ $post->body }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
 </form>