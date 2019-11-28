@extends('layouts.app')

@section('content')
    <h1>Add new Category</h1>
    <form method="post" action="{{ route('category.store') }}">
        {{ csrf_field() }}
        <div class="form-group">            
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Product Name here"/>
        </div>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea class="form-control" name="Description" id='article-ckeditor' cols="30" rows="10" placeholder="Product Description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
@endsection
