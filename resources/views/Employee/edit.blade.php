@extends('layouts.app')

@section('content')
    <h1>Update Employee</h1>
    <form action="{{ route('employees.update',$employee->id) }}" method="POST">
        {{ csrf_field() }}  
        <div class="form-group">            
            <label for="name">Name</label>
            <input type="text" class="form-control" value="{{$employee->name}}" name="name" placeholder="Full Name"/>
        </div>
        <div class="form-group">
            <label for="job">Job Title</label>
            <select class="form-control" name="job">
                <option value="" selected>select Position</option>
                <option value="staff" @if ($employee->job_title == 'staff') selected="selected" @endif>Staff</option>
                <option value="manager" @if ($employee->job_title == 'manager') selected="selected" @endif>Manager</option>
            </select>
        </div>
        <div class="form-group">            
            <label for="salary">Salary</label>
            <input type="number" class="form-control" value="{{$employee->salary}}" name="salary" placeholder="$$$$"/>
        </div>
        <div class="form-group">
            <label for="email">E-Mail Address</label>
            <input type="email" class="form-control" value="{{$employee->email}}" name="email" placeholder="email"/>
        </div>    
        <div class="form-group">            
            <label for="password">Password</label>
            <input type="text" class="form-control" name="password" placeholder="password"/>
        </div>
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-primary">Update Employee</button>
    </form>
@endsection
