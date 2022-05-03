@extends('layouts.bootstrap')

@section('title')
Details User
@endsection

@section('content')
<div class="row ">
    <div class="col-12">
      <div class="card card-success">
        <div class="card-header">
            <h3>Detail {{$users->name}}</h3>
        </div>
        <div class="card-body table-responsive">
            <a href="{{route('users.index')}}" class="btn btn-secondary">Back</a>
            <hr/>

            <table class="table table-bordered">
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td>{{$users->name}}</td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{$users->email}}</td>
                </tr>

                <tr>
                    <td>Address</td>
                    <td>:</td>
                    <td>{{$users->address}}</td>
                </tr>

                <tr>
                    <td>Phone Number</td>
                    <td>:</td>
                    <td>{{$users->phone}}</td>
                </tr>

                <tr>
                    <td>House Number</td>
                    <td>:</td>
                    <td>{{$users->house_number}}</td>
                </tr>

                <tr>
                    <td>RT & RW</td>
                    <td>:</td>
                    <td>{{$users->rt_rw}}</td>
                </tr>

                <tr>
                    <td>Avatar</td>
                    <td>:</td>
                    <td>
                        <img src="{{$users->avatar}}" width="50px" height="50px" alt="">
                    </td>
                </tr>

                <tr>
                    <td>Role</td>
                    <td>:</td>
                    <td>{{$users->role}}</td>
                </tr>

                <tr>
                    <td>status</td>
                    <td>:</td>
                    <td>{{$users->status}}</td>
                </tr>
            </table>
        </div>
        <div class="card-footer">
        </div>
      </div>
    </div>
  </div>
@endsection

