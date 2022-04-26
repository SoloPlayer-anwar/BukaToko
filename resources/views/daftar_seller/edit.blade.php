@extends('layouts.bootstrap')

@section('title')
Edit Daftar Seller
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <h3>Edit {{$daftar_seller->name_toko}}</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('daftar_seller.update', [$daftar_seller->id]) }}" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">

                  <div class="form-group">
                    <label for="name_toko">Name Toko</label>
                    <input type="text" class="form-control {{$errors->first('name_toko') ? 'is-invalid' : ''}}" name="name_toko" id="name_toko" placeholder="Enter Nama Toko" value="{{ $daftar_seller->name_toko }}">
                    <span class="error invalid-feedback">{{$errors->first('name_toko')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="photo_ktp">Photo KTP</label>
                    <div class="input-group">
                        <img src="{{asset('uploads/' .$daftar_seller->photo_ktp)}}" width="40px" height="40px" alt="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="photo_ktp"></label>
                    <input type="file" class="form-control {{$errors->first('photo_ktp') ? 'is-invalid' : ''}}"
                    name="photo_ktp" id="photo_ktp">
                    <span class="error invalid-feedback">{{$errors->first('photo_ktp')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="address_seller">Address Seller</label>
                    <input type="text" class="form-control {{$errors->first('address_seller') ? 'is-invalid' : ''}}" name="address_seller" id="address_seller" placeholder="Enter Address Seller" value="{{ $daftar_seller->address_seller }}">
                    <span class="error invalid-feedback">{{$errors->first('address_seller')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" class="form-control {{$errors->first('latitude') ? 'is-invalid' : ''}}" name="latitude" id="latitude" placeholder="Enter Address Latitude" value="{{ $daftar_seller->latitude }}">
                    <span class="error invalid-feedback">{{$errors->first('latitude')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" class="form-control {{$errors->first('longitude') ? 'is-invalid' : ''}}" name="longitude" id="longitude" placeholder="Enter Address Longitude" value="{{ $daftar_seller->longitude }}">
                    <span class="error invalid-feedback">{{$errors->first('longitude')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="name_user">Name User</label>
                    <input type="text" class="form-control {{$errors->first('name_user') ? 'is-invalid' : ''}}" name="name_user" id="name_user" placeholder="Enter Name User" value="{{ $daftar_seller->name_user }}">
                    <span class="error invalid-feedback">{{$errors->first('name_user')}}</span>
                  </div>

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Update Daftar Seller</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection
