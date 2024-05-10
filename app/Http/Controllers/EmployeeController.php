<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeFormRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=Employee::all();
        return view('employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeFormRequest $request)
    {
        $data = $request->validated();

        $employee = new Employee;

        $employee->emp_name = $data['Employee-Name'];
        $employee->emp_age = $data['Employee-Age'];

        $employee->save();

        return redirect(route('employee.index'))->with('status','Employee Added Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($employee_id)
    {
        $employee=Employee::find($employee_id);
        return view('employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeFormRequest $request, $employee_id)
    {
        $data = $request->validated();

        $employee = Employee::find($employee_id);

        $employee->emp_name = $data['Employee-Name'];
        $employee->emp_age = $data['Employee-Age'];

        $employee->update();

        return redirect(route('employee.index'))->with('status','Employee Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($employee_id)
    {
        $employee=Employee::find($employee_id);

        $employee->delete();

        return redirect(route('employee.index'))->with('status','Employee Deleted Successfully!');
    }
}
