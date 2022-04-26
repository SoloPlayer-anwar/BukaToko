@extends('layouts.bootstrap')

@section('title')
Edit Category
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <h3>Edit {{$category->name_category}}</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('category.update', [$category->id]) }}" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="name_category">Name Category</label>
                    <input type="text" class="form-control {{$errors->first('name_category') ? 'is-invalid' : ''}}" name="name_category" id="name_category" placeholder="Enter name" value="{{ $category->name_category }}">
                    <span class="error invalid-feedback">{{$errors->first('name_category')}}</span>
                  </div>


                  <div class="form-group">
                    <label for="photo_category">Photo Category</label>
                    <div class="input-group">
                        <img src="{{asset('uploads/' .$category->photo_category)}}" width="40px" height="40px" alt="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="photo_category"></label>
                    <input type="file" class="form-control {{$errors->first('photo_category') ? 'is-invalid' : ''}}"
                    name="photo_category" id="photo_category">
                    <span class="error invalid-feedback">{{$errors->first('photo_category')}}</span>
                  </div>


                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Update Category</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection
