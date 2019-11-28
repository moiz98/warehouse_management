@extends('layouts.app')

@section('content')
    <h1>Add new Employee</h1>
    <form method="post" action="{{ route('employees.store') }}">
        {{ csrf_field() }}
        <div class="form-group">            
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Full Name"/>
        </div>
        <div class="form-group">
            <label for="job">Job Title</label>
            <select class="form-control" name="job">
                <option value="" selected>select Disignation</option>
                <option value="staff">Staff</option>
                <option value="manager">Manager</option>
            </select>
        </div>
        <div class="form-group">            
            <label for="salary">Salary</label>
            <input type="number" class="form-control" name="salary" placeholder="$$$$"/>
        </div>
        <div class="form-group">
            <label for="email">E-Mail Address</label>
            <input type="email" class="form-control" name="email" placeholder="email"/>
        </div>    
        <div class="form-group">            
            <label for="password">Password</label>
            <input type="text" class="form-control" name="password" placeholder="password"/>
        </div>
        <button type="submit" class="btn btn-primary">Add Employee</button>
    </form>
@endsection
