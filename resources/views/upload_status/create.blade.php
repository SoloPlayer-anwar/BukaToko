@extends('layouts.bootstrap')

@section('title')
Create Upload Status
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <h3>Create Status</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('upload_status.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name_user">Name User</label>
                    <input type="text" class="form-control {{$errors->first('name_user') ? 'is-invalid' : ''}}" name="name_user" id="name_user" placeholder="Enter Name User" value="{{ old('name_user') }}">
                    <span class="error invalid-feedback">{{$errors->first('name_user')}}</span>
                  </div>


                  <div class="form-group">
                    <label for="desc">Description</label>
                    <input type="text" class="form-control {{$errors->first('desc') ? 'is-invalid' : ''}}" name="desc" id="desc" placeholder="Enter Description" value="{{ old('desc') }}">
                    <span class="error invalid-feedback">{{$errors->first('desc')}}</span>
                  </div>



                  <div class="form-group">
                    <label for="video">Video</label>
                    <input type="text" class="form-control {{$errors->first('video') ? 'is-invalid' : ''}}" name="video" id="video" placeholder="Enter Video Url" value="{{ old('video') }}">
                    <span class="error invalid-feedback">{{$errors->first('video')}}</span>
                  </div>


                  <div class="form-group">
                    <label for="photo_user">Photo User</label>
                    <input type="file" class="form-control {{$errors->first('photo_user') ? 'is-invalid' : ''}}"
                    name="photo_user" id="photo_user">
                    <span class="error invalid-feedback">{{$errors->first('photo_user')}}</span>
                  </div>


                  <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control {{$errors->first('judul') ? 'is-invalid' : ''}}" name="judul" id="video" placeholder="Enter Video Url" value="{{ old('judul') }}">
                    <span class="error invalid-feedback">{{$errors->first('judul')}}</span>
                  </div>

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection
