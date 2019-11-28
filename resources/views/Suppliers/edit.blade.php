@extends('layouts.app')

@section('content')
    <h1>Update Supplier</h1>
    <form action="{{ route('suppliers.update',$supplier->id) }}" method="POST">
        {{ csrf_field() }}            
        <div class="form-group">            
            <label for="fname">First Name</label>
        <input type="text" class="form-control" value="{{$supplier->Supplier_first_name}}" name="fname" placeholder="First Name"/>
        </div>
        <div class="form-group">
            <label for="lname">Last name</label>
            <input type="text" class="form-control" value="{{$supplier->Supplier_last_name}}" name="lname" placeholder="Last Name"/>
        </div>
        <div class="form-group">            
            <label for="phone">Phone</label>
            <input type="tel" class="form-control" pattern="[0-9]{11}" value="{{$supplier->Supplier_phone}}" name="phone"/>
        </div>
        {{-- <div class="form-group">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
            <input type="email" class="form-control" name="email" placeholder="email"/>
        </div>     --}}
        <div class="form-group">            
            <label for="company">Company</label>
            <input type="text" class="form-control" value="{{$supplier->Supplier_Company}}" name="company" placeholder="$$$$"/>
        </div>
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-primary">Update Supplier</button>
    </form>
@endsection
