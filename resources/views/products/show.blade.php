@extends('layouts.app')

@section('content')
<h1>{{ $prod->name }}</h1>
<small>written on {{$prod->created_at}}</small>
<div>
    {!!$prod->Description!!}
    <hr>
{{-- <a href="/Products/{{$product->id}}/edit" class="btn btn-defualt">edit</a> --}}
</div>
@endsection
