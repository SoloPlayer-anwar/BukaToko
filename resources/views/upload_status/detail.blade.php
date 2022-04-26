@extends('layouts.bootstrap')

@section('title')
Details Status
@endsection

@section('content')
<div class="row ">
    <div class="col-12">
      <div class="card card-success">
        <div class="card-header">
            <h3>Detail {{$upload_status->name_user}}</h3>
        </div>
        <div class="card-body table-responsive">
            <a href="{{route('users.index')}}" class="btn btn-secondary">Back</a>
            <hr/>

            <table class="table table-bordered">
                <tr>
                    <td>Name User</td>
                    <td>:</td>
                    <td>{{$upload_status->name_user}}</td>
                </tr>

                <tr>
                    <td>Video Url</td>
                    <td>:</td>
                    <td>{{$upload_status->video}}</td>
                </tr>

                <tr>
                    <td>Image User</td>
                    <td>:</td>
                    <td><img src="{{asset('uploads/'.$upload_status->photo_user)}}" width="50px" height="50px" alt="Server sedang gangguan"></td>
                </tr>

                <tr>
                    <td>Judul</td>
                    <td>:</td>
                    <td>{{$upload_status->judul}}</td>
                </tr>

                <tr>
                    <td>Description</td>
                    <td>:</td>
                    <td>{{$upload_status->desc}}</td>
                </tr>


            </table>
        </div>
        <div class="card-footer">
        </div>
      </div>
    </div>
  </div>
@endsection

