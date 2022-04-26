@extends('layouts.bootstrap')

@section('title')
Edit Komentar
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <h3>Edit {{$komentar->name_comment}}</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('komentar.update', [$komentar->id]) }}" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="name_comment">Nama Komentar</label>
                    <input type="text" class="form-control {{$errors->first('name_comment') ? 'is-invalid' : ''}}" name="name_comment" id="name_comment" placeholder="Enter Nama Komentar" value="{{ $komentar->name_comment }}">
                    <span class="error invalid-feedback">{{$errors->first('name_comment')}}</span>
                  </div>


                  <div class="form-group">
                    <label for="status_comment">Status Commment</label>
                    <input type="text" class="form-control" disabled id="status_comment" placeholder="Enter Status Comment" value="{{ $komentar->status_comment }}">
                  </div>


                  <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" class="form-control" disabled id="category" placeholder="Enter Category" value="{{ $komentar->category }}">
                  </div>

                  <div class="form-group">
                    <label for="rate_comment">Rate Comment</label>
                    <input type="number" class="form-control {{$errors->first('rate_comment') ? 'is-invalid' : ''}}" name="rate_comment" id="rate_comment" placeholder="Enter Rating Komentar" value="{{ $komentar->rate_comment }}">
                    <span class="error invalid-feedback">{{$errors->first('rate_comment')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="comment">Comment</label>
                    <input type="text" class="form-control {{$errors->first('comment') ? 'is-invalid' : ''}}" name="comment" id="comment" placeholder="Enter phone" value="{{ $komentar->comment }}">
                    <span class="error invalid-feedback">{{$errors->first('comment')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="comment_admin">Comment Admin</label>
                    <input type="text" class="form-control {{$errors->first('comment_admin') ? 'is-invalid' : ''}}" name="comment_admin" id="comment_admin" placeholder="Enter Comment Admin" value="{{ $komentar->comment_admin }}">
                    <span class="error invalid-feedback">{{$errors->first('comment_admin')}}</span>
                  </div>


                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Update Komentar</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection
