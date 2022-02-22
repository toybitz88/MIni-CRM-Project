@extends('layout')
@section('title','Add Employee')
@section('content')
    <div class="card mb-4 mt-5">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create New Employee
            <a href="{{url('employee')}}" class="float-end btn bnt-sm btn-success">View all</a>
        </div>
        <div class="card-body">
            @if($errors -> any())
                @foreach ($errors -> all() as $error)
                <p class="text-danger">{{$error}} </p>
                @endforeach
            @endif
            @if (Session::has('msg'))
                <p class="text-success">{{session('msg')}} </p>
            @endif
            <form action="{{url('employee')}}" method="post">
                @csrf
                 <table class="table table-bordered">
                         
                        <tr>
                            <th>First Name</th>
                            <td>
                                <input type="text" class="form-control" placeholder="First Name" name="first_name">
                            </td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td>
                                <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                            </td>
                           
                        </tr>
                        <tr>
                            <th>Company</th>
                            <td>
                                <select class="form-control" name="department_id">
                                    <option selected disabled><-Select Company-></option>
                                    @if($empData)
                                        @foreach($empData as $d)
                                            
                                            <option value="{{$d->id}}">{{$d->cname}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>
                                <input type="text" class="form-control" placeholder="Employee Email" name="eemail">
                            </td>
                        </tr>
                        <tr>
                        <th>Phone</th>
                        <td>
                            <input type="text" class="form-control" placeholder="Employee Phone" name="ephone">
                        </td>
                     </tr>
                     <tr>
                        <td colspan = "2">
                            <input onclick="submitWarning()" class="btn btn-primary" type="submit" value="Submit"/>
                        </td>
                     </tr>
                </table>
            </form>  
        </div>
    </div>
@endsection