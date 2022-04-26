@extends('layouts.bootstrap')

@section('title')
Create Data Gudang
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <h3>Create Data Gudang</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('gudang.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name_gudang">Name Gudang</label>
                    <input type="text" class="form-control {{$errors->first('name_gudang') ? 'is-invalid' : ''}}" name="name_gudang" id="name_gudang" placeholder="Enter Name Gudang" value="{{ old('name_gudang') }}">
                    <span class="error invalid-feedback">{{$errors->first('name_gudang')}}</span>
                  </div>


                  <div class="form-group">
                    <label for="address_gudang">Alamat Gudang</label>
                    <input type="text" class="form-control {{$errors->first('address_gudang') ? 'is-invalid' : ''}}" name="address_gudang" id="address_gudang" placeholder="Enter Alamat Gudang" value="{{ old('address_gudang') }}">
                    <span class="error invalid-feedback">{{$errors->first('address_gudang')}}</span>
                  </div>


                  <div class="form-group">
                    <label for="photo_gudang">Photo Gudang</label>
                    <input type="file" class="form-control {{$errors->first('photo_gudang') ? 'is-invalid' : ''}}"
                    name="photo_gudang" id="photo_gudang">
                    <span class="error invalid-feedback">{{$errors->first('photo_gudang')}}</span>
                  </div>


                  <div class="form-group">
                    <label for="latitude_gudang">Latitude</label>
                    <input type="text" class="form-control {{$errors->first('latitude_gudang') ? 'is-invalid' : ''}}" name="latitude_gudang" id="video" placeholder="Enter Latitude Anda" value="{{ old('latitude_gudang') }}">
                    <span class="error invalid-feedback">{{$errors->first('latitude_gudang')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="longitude_gudang">Longitude</label>
                    <input type="text" class="form-control {{$errors->first('longitude_gudang') ? 'is-invalid' : ''}}" name="longitude_gudang" id="video" placeholder="Enter Longitude Anda" value="{{ old('longitude_gudang') }}">
                    <span class="error invalid-feedback">{{$errors->first('longitude_gudang')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="status">Status Gudang</label>
                    <select name="status" id="status" class="form-control {{$errors->first('status') ?  'is-invalid' : ''}}">
                        <option value="buka">Buka</option>
                        <option value="tutup">Tutup</option>
                    </select>
                    <span class="error invalid-feedback">{{$errors->first('status')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="promo">Promo Gudang</label>
                    <input type="text" class="form-control {{$errors->first('promo') ? 'is-invalid' : ''}}" name="promo" id="video" placeholder="Enter Promo Gudang" value="{{ old('promo') }}">
                    <span class="error invalid-feedback">{{$errors->first('promo')}}</span>
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
