<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();
        return view('Employee.index')->with('employee', $employee);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'job' => 'required',
            'salary' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $employee = new Employee;
        $employee->name = $request->input('name');
        $employee->job_title = $request->input('job');
        $employee->salary = $request->input('salary');
        $employee->email = $request->input('email');
        $employee->password = bcrypt($request->input('password'));
        $employee->save();
        
        return redirect('/employees')->with('success', 'Employee Hired');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('Employee.show')->with('employee',$employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('Employee.edit')->with('employee', $employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'job' => 'required',
            'salary' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $employee = Employee::find($id);
        $employee->name = $request->input('name');
        $employee->job_title = $request->input('job');
        $employee->salary = $request->input('salary');
        $employee->email = $request->input('email');
        $employee->password = bcrypt($request->input('password'));
        $employee->save();
        
        return redirect('/employees')->with('success', 'Employee updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect('/employees')->with('success', 'Employee Removed');
    }
}
