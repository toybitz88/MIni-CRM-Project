@extends('layout')
@section('title','Update Company')
@section('content')
    <div class="card mb-4 mt-5">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Update Company
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
            <form action="/depart/{{$data->id}}" method="post" enctype="multipart/form-data">
                
                @csrf
                @method('PUT')
                 <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <td>
                                <input type="text" class="form-control" value="{{$data->cname}}" name="cname">
                            </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>
                                <input type="email" class="form-control" value="{{$data->cemail}}" name="cemail">
                            </td>
                        </tr>
                        <tr>
                            <th>Logo</th>
                            <td>
                                <input type="file" class="form-control" name="clogo">
                               
                            </td>
                        </tr>
                        <tr>
                        <th>Website</th>
                        <td>
                            <input type="text" class="form-control" value="{{$data->cwebsite}}" name="cwebsite">
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