@extends('layouts.app')

@section('content')
    <h1>Edit Category</h1>
    <form action="{{ route('category.update',$category->id) }}" method="POST">
        {{ csrf_field() }}            
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" value="{{ $category->Category_name }}" name="name" placeholder="Product Name here"/>
        </div>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea class="form-control" name="Description" id='article-ckeditor' cols="30" rows="10" placeholder="Detail">{{ $category->Category_Description }}</textarea>
        </div>
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
@endsection