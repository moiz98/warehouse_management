@extends('layouts.app')

@section('content')
    <h1>Add new Supplier</h1>
    <form method="post" action="{{ route('suppliers.store') }}">
        {{ csrf_field() }}
        <div class="form-group">            
            <label for="fname">First Name</label>
            <input type="text" class="form-control" name="fname" placeholder="First Name"/>
        </div>
        <div class="form-group">
            <label for="lname">Last name</label>
            <input type="text" class="form-control" name="lname" placeholder="Last Name"/>
        </div>
        <div class="form-group">            
            <label for="phone">Phone</label>
            <input type="tel" class="form-control" pattern="[0-9]{11}" name="phone"/>
        </div>
        <div class="form-group">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
            <input type="email" class="form-control" name="email" placeholder="email"/>
        </div>    
        <div class="form-group">            
            <label for="company">Company</label>
            <input type="text" class="form-control" name="company" placeholder="company name"/>
        </div>
        <button type="submit" class="btn btn-primary">Add Supplier</button>
    </form>
@endsection
