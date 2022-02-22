@extends('layout')
@section('title','Update Employee')
@section('content')
    <div class="card mb-4 mt-5">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Update Employee
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
            <form action="/employee/{{$empData->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <table class="table table-bordered">
                        <tr>
                            <th>First Name</th>
                            <td>
                                <input type="text" class="form-control" value="{{$empData->first_name}}" name="first_name">
                            </td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td>
                                <input type="text" class="form-control" value="{{$empData->last_name}}"  name="last_name">
                            </td>  
                        </tr>
                        <tr>
                            <th>Company</th>
                            <td>
                                <select class="form-control" name="department_id">
                                    <option selected disabled><-Select Company-></option>
                                        @foreach($departs as $departUpdate)
                                            
                                            <option @if($departUpdate->id==$empData->department_id) selected @endif 
                                                value="{{$departUpdate->id}}">{{$departUpdate->cname}}</option>
                                        @endforeach
                                 
                                </select>
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <th>Email</th>
                            <td>
                                <input type="text" class="form-control" value="{{$empData->email}}"  name="eemail">
                            </td>
                        </tr>
                        <tr>
                        <th>Phone</th>
                        <td>
                            <input type="text" class="form-control" value="{{$empData->phone}}"  name="ephone">
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