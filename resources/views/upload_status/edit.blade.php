@extends('layouts.bootstrap')

@section('title')
Edit Data Upload Status
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <h3>Edit {{$upload_status->name}}</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('upload_status.update', [$upload_status->id]) }}" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="name_user">Name User</label>
                    <input type="text" class="form-control {{$errors->first('name_user') ? 'is-invalid' : ''}}" name="name_user" id="name_user" placeholder="Enter Name User" value="{{ $upload_status->name_user }}">
                    <span class="error invalid-feedback">{{$errors->first('name_user')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea type="text" class="form-control {{$errors->first('desc') ? 'is-invalid' : ''}}" name="desc" id="desc" placeholder="Enter Name User" value="{{ $upload_status->desc }}"></textarea>
                    <span class="error invalid-feedback">{{$errors->first('desc')}}</span>
                  </div>


                  <div class="form-group">
                    <label for="video">Video Url</label>
                    <input type="text" class="form-control {{$errors->first('video') ? 'is-invalid' : ''}}" name="video" id="video" placeholder="Enter video" value="{{ $upload_status->video }}">
                    <span class="error invalid-feedback">{{$errors->first('video')}}</span>
                  </div>


                  <div class="form-group">
                    <label for="photo_user">Photo User</label>
                    <div class="input-group">
                        <img src="{{$upload_status->photo_user}}" width="40px" height="40px" alt="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="photo_user"></label>
                    <input type="file" class="form-control {{$errors->first('photo_user') ? 'is-invalid' : ''}}"
                    name="photo_user" id="photo_user">
                    <span class="error invalid-feedback">{{$errors->first('photo_user')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control {{$errors->first('judul') ? 'is-invalid' : ''}}" name="judul" id="judul" placeholder="Enter Judul Video" value="{{ $upload_status->judul }}">
                    <span class="error invalid-feedback">{{$errors->first('judul')}}</span>
                  </div>

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Update Status User</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection
