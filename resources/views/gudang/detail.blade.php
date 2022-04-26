@extends('layouts.bootstrap')

@section('title')
Details Gudang
@endsection

@section('content')
<div class="row ">
    <div class="col-12">
      <div class="card card-success">
        <div class="card-header">
            <h3>Detail {{$data_gudang->name_gudang}}</h3>
        </div>
        <div class="card-body table-responsive">
            <a href="{{route('gudang.index')}}" class="btn btn-secondary">Back</a>
            <hr/>

            <table class="table table-bordered">
                <tr>
                    <td>Name Gudang</td>
                    <td>:</td>
                    <td>{{$data_gudang->name}}</td>
                </tr>

                <tr>
                    <td>Alamat Gudang</td>
                    <td>:</td>
                    <td>{{$data_gudang->address_gudang}}</td>
                </tr>

                <tr>
                    <td>Photo Gudang</td>
                    <td>:</td>
                    <td>
                        <img src="{{asset('uploads/'.$data_gudang->photo_gudang)}}" width="50px" height="50px" alt="">
                    </td>
                </tr>

                <tr>
                    <td>Latitude Gudang</td>
                    <td>:</td>
                    <td>{{$data_gudang->latitude_gudang}}</td>
                </tr>

                <tr>
                    <td>Longitude Gudang</td>
                    <td>:</td>
                    <td>{{$data_gudang->longitude_gudang}}</td>
                </tr>

                <tr>
                    <td>Status Gudang</td>
                    <td>:</td>
                    <td>{{$data_gudang->status}}</td>
                </tr>

                <tr>
                    <td>Promo Gudang</td>
                    <td>:</td>
                    <td>{{$data_gudang->promo}}</td>
                </tr>

            </table>
        </div>
        <div class="card-footer">
        </div>
      </div>
    </div>
  </div>
@endsection

