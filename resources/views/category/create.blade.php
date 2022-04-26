@extends('layouts.bootstrap')

@section('title')
Create Category
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <h3>Create Category</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name_category">Name Category</label>
                    <input type="text" class="form-control {{$errors->first('name_category') ? 'is-invalid' : ''}}" name="name_category" id="name_category" placeholder="Enter Nama Category" value="{{ old('name_category') }}">
                    <span class="error invalid-feedback">{{$errors->first('name_category')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="photo_category">Photo Category</label>
                    <input type="file" class="form-control {{$errors->first('photo_category') ? 'is-invalid' : ''}}"
                    name="photo_category" id="photo_category">
                    <span class="error invalid-feedback">{{$errors->first('photo_category')}}</span>
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
