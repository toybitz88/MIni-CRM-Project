@extends('layout')
@section('title','Employee')
@section('content')

<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                All Employee
                                <a href="{{url('employee/create')}}" class="float-end btn bnt-sm btn-success">Add new</a>
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
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Company</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Company</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                            <th>#</th>
                                            <th>Company</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Company</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if($empData)
                                            @foreach($empData as $d)
                                            <tr>
                                                <td>{{$d->id}}</td>
                                                <td>{{$d->department->cname}}</td>
                                                <td>{{$d->first_name}}</td>
                                                <td>{{$d->last_name}}</td>
                                                <td>{{$d->email}}</td>
                                                <td>{{$d->phone}}</td>
                                                <td>

                                                    <div class="d-flex flex-row bd-highlight mb-3">
                                                        <div class="p-2 bd-highlight"> <a class="btn btn-outline-info" href="{{url('employee/'.$d->id.'/edit')}}">Update</a></div>
                                                        <div class="p-2 bd-highlight"><form action="/employee/{{$d->id}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button  onclick="deleteWarning()" class="btn btn-outline-danger"  type="submit">
                                                                Delete
                                                            </button>
                                                        </form></div>                                      
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
        <script>
                function deleteWarning() {
                    confirm("Wants to delete?");
                }
        </script> 
        
        
@endsection