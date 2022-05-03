@extends('layouts.bootstrap')

@section('title')
Details Komentar
@endsection

@section('content')
<div class="row ">
    <div class="col-12">
      <div class="card card-success">
        <div class="card-header">
            <h3>Detail {{$komentar->name_comment}}</h3>
        </div>
        <div class="card-body table-responsive">
            <a href="{{route('komentar.index')}}" class="btn btn-secondary">Back</a>
            <hr/>

            <table class="table table-bordered">
                <tr>
                    <td>Name Comment</td>
                    <td>:</td>
                    <td>{{$komentar->name_comment}}</td>
                </tr>

                <tr>
                    <td>Status Comment</td>
                    <td>:</td>
                    <td>{{$komentar->status_comment}}</td>
                </tr>

                <tr>
                    <td>Category Product</td>
                    <td>:</td>
                    <td>{{$komentar->category}}</td>
                </tr>

                <tr>
                    <td>Rate Comment</td>
                    <td>:</td>
                    <td>{{$komentar->rate_comment}}</td>
                </tr>


                <tr>
                    <td>Photo Komentar</td>
                    <td>:</td>
                    <td>
                        <img src="{{$komentar->photo_comment}}" width="50px" height="50px" alt="">
                    </td>
                </tr>

                <tr>
                    <td>Comment User</td>
                    <td>:</td>
                    <td>{{$komentar->comment}}</td>
                </tr>

                <tr>
                    <td>Comment Admin</td>
                    <td>:</td>
                    <td>{{$komentar->comment_admin}}</td>
                </tr>


            </table>
        </div>
        <div class="card-footer">
        </div>
      </div>
    </div>
  </div>
@endsection

