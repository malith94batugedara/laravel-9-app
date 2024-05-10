@extends('layouts.app')

@section('title','EMS | All Employees')

@section('content')

     <div class="container">

           <h1>All Employees<a href="{{ route('employee.create') }}" class="btn btn-primary float-end">Add New Employee</a></h1><br/>
           @if(session('status'))
           <div class="alert alert-success">
                 {{ session('status') }}
           </div>
           @endif
             <table class="table table-dark table-bordered">
                  <thead>
                       <tr>
                         <th>Emp Name</th>
                         <th>Emp Age</th>
                         <th>Action</th>
                       </tr>
                  </thead>
                  <tbody>
                     @foreach ($employees as $employee)
                        <tr>
                         <td>{{$employee->emp_name}}</td>
                         <td>{{$employee->emp_age}}</td>
                         <td>
                             <a href="{{ route('employee.edit',$employee->id) }}" class="btn btn-success">Edit</a>
                             <a href="{{ route('employee.delete',$employee->id) }}" class="btn btn-danger">Delete</a>
                         </td>
                        </tr>
                     @endforeach
                  </tbody>
             </table>
     </div>

@endsection
