@extends('layouts.app')

@section('title','EMS | Add New Employee')

@section('content')

     <div class="container">

           <h1>Add New Employee<a href="{{ route('employee.index') }}" class="btn btn-primary float-end">All Employees</a></h1><br/>
           <div>
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                  <div> {{ $error }} </div>
                @endforeach
            </div>
            @endif
           </div>
           <form action="{{ route('employee.store') }}" method="post">
             @csrf
                
             <label>Employee Name</label>
             <input type="text" name="Employee-Name" class="form-control" placeholder="Enter Employee Name"/><br/>
             <label>Employee Age</label>
             <input type="text" name="Employee-Age" class="form-control" placeholder="Enter Employee Age"/><br/>
             <input type="submit" value="Save" class="btn btn-success"/>
             <input type="reset" value="Reset" class="btn btn-warning"/>
           </form>

     </div>

@endsection
