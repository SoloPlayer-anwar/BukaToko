@extends('layouts.bootstrap')

@section('title')
Edit Data Gudang
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <h3>Edit {{$data_gudang->name_gudang}}</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('gudang.update', [$data_gudang->id]) }}" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="name_gudang">Name Gudang</label>
                    <input type="text" class="form-control {{$errors->first('name_gudang') ? 'is-invalid' : ''}}" name="name_gudang" id="name_gudang" placeholder="Enter Name Gudang" value="{{ $data_gudang->name_gudang }}">
                    <span class="error invalid-feedback">{{$errors->first('name_gudang')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="address_gudang">Alamat Gudang</label>
                    <input type="text" class="form-control {{$errors->first('address_gudang') ? 'is-invalid' : ''}}" name="address_gudang" id="address_gudang" placeholder="Enter Name User" value="{{ $data_gudang->address_gudang }}">
                    <span class="error invalid-feedback">{{$errors->first('address_gudang')}}</span>
                  </div>


                  <div class="form-group">
                    <label for="photo_gudang">Photo Gudang</label>
                    <div class="input-group">
                        <img src="{{$data_gudang->photo_gudang}}" width="40px" height="40px" alt="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="photo_gudang"></label>
                    <input type="file" class="form-control {{$errors->first('photo_gudang') ? 'is-invalid' : ''}}"
                    name="photo_gudang" id="photo_gudang">
                    <span class="error invalid-feedback">{{$errors->first('photo_gudang')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="latitude_gudang">Latitude</label>
                    <input type="text" class="form-control {{$errors->first('latitude_gudang') ? 'is-invalid' : ''}}" name="latitude_gudang" id="latitude_gudang" placeholder="Enter latitude " value="{{ $data_gudang->latitude }}">
                    <span class="error invalid-feedback">{{$errors->first('latitude_gudang')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="longitude_gudang">Longitude</label>
                    <input type="text" class="form-control {{$errors->first('longitude_gudang') ? 'is-invalid' : ''}}" name="longitude_gudang" id="longitude_gudang" placeholder="Enter Longitude " value="{{ $data_gudang->longitude_gudang }}">
                    <span class="error invalid-feedback">{{$errors->first('longitude_gudang')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="status">Status Gudang</label>
                    <select name="status" id="status" class="form-control {{$errors->first('status') ?  'is-invalid' : ''}}">
                        <option value="buka" @if ($data_gudang->status == 'Buka') selected @endif>Buka</option>
                        <option value="tutup" @if ($data_gudang->status == 'Tutup') selected @endif>Tutup</option>
                    </select>
                    <span class="error invalid-feedback">{{$errors->first('role')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="promo">Promo Gudang</label>
                    <input type="text" class="form-control {{$errors->first('promo') ? 'is-invalid' : ''}}" name="promo" id="promo" placeholder="Enter Promo Gudang " value="{{ $data_gudang->promo }}">
                    <span class="error invalid-feedback">{{$errors->first('promo')}}</span>
                  </div>

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Update Gudang</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection
