@extends('layouts.bootstrap')

@section('title')
Create RajaOngkir
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <h3>Create RajaOngkir</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('raja_ongkir.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name_ongkir">Name Ongkir</label>
                    <input type="name_ongkir" class="form-control {{$errors->first('name_ongkir') ? 'is-invalid' : ''}}" name="name_ongkir" id="name_ongkir" placeholder="Enter name_ongkir" value="{{ old('name_ongkir') }}">
                    <span class="error invalid-feedback">{{$errors->first('name_ongkir')}}</span>
                  </div>


                  <div class="form-group">
                    <label for="price_ongkir">Price Ongkir</label>
                    <input type="number" class="form-control {{$errors->first('price_ongkir') ? 'is-invalid' : ''}}" name="price_ongkir" id="price_ongkir" placeholder="Enter price_ongkir" value="{{ old('price_ongkir') }}">
                    <span class="error invalid-feedback">{{$errors->first('price_ongkir')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="photo_ongkir">Photo Ongkir</label>
                    <input type="file" class="form-control {{$errors->first('photo_ongkir') ? 'is-invalid' : ''}}"
                    name="photo_ongkir" id="photo_ongkir">
                    <span class="error invalid-feedback">{{$errors->first('photo_ongkir')}}</span>
                  </div>

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save Ongkir</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection
