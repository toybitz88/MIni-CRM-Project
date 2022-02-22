@extends('layout')
@section('title','Add Company')
@section('content')
    <div class="card mb-4 mt-5">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create Company
            <a href="{{url('depart')}}" class="float-end btn bnt-sm btn-success">View all</a>
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
            <form action="{{url('depart')}}" method="post" enctype="multipart/form-data">
                @csrf
                 <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <td>
                                <input type="text" class="form-control" placeholder="Company Name" name="cname">
                            </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>
                                <input type="email" class="form-control" placeholder="Company Email" name="cemail">
                            </td>
                        </tr>
                        <tr>
                            <th>Logo</th>
                            <td>
                                <input type="file" class="form-control"  name="clogo">
                            </td>
                        </tr>
                        <tr>
                        <th>Website</th>
                        <td>
                            <input type="text" class="form-control" placeholder="Company Website" name="cwebsite">
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