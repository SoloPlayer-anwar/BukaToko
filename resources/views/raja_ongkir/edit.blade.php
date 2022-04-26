@extends('layouts.bootstrap')

@section('title')
Edit RajaOngkir
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <h3>Edit</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('raja_ongkir.update', [$raja_ongkir->id]) }}" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="name_ongkir">Name Ongkir</label>
                    <input type="text" class="form-control {{$errors->first('name_ongkir') ? 'is-invalid' : ''}}" name="name_ongkir" id="name_ongkir" placeholder="Enter name_ongkir" value="{{ $raja_ongkir->name_ongkir }}">
                    <span class="error invalid-feedback">{{$errors->first('name_ongkir')}}</span>
                  </div>


                  <div class="form-group">
                    <label for="price_ongkir">Price Ongkir</label>
                    <input type="number" class="form-control {{$errors->first('price_ongkir') ? 'is-invalid' : ''}}" name="price_ongkir"  id="price_ongkir" placeholder="Enter price_ongkir" value="{{ $raja_ongkir->price_ongkir }}">
                  </div>


                  <div class="form-group">
                    <label for="photo_ongkir">Photo Ongkir</label>
                    <div class="input-group">
                        <img src="{{asset('uploads/' .$raja_ongkir->photo_ongkir)}}" width="40px" height="40px" alt="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="photo_ongkir"></label>
                    <input type="file" class="form-control {{$errors->first('photo_ongkir') ? 'is-invalid' : ''}}"
                    name="photo_ongkir" id="photo_ongkir">
                    <span class="error invalid-feedback">{{$errors->first('photo_ongkir')}}</span>
                  </div>

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Update Ongkir</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection
