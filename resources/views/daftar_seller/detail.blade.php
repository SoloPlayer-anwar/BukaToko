@extends('layouts.bootstrap')

@section('title')
Details Seller
@endsection

@section('content')
<div class="row ">
    <div class="col-12">
      <div class="card card-success">
        <div class="card-header">
            <h3>Detail {{$daftar_seller->name_user}}</h3>
        </div>
        <div class="card-body table-responsive">
            <a href="{{route('daftar_seller.index')}}" class="btn btn-secondary">Back</a>
            <hr/>

            <table class="table table-bordered">
                <tr>
                    <td>Name Toko</td>
                    <td>:</td>
                    <td>{{$daftar_seller->name_toko}}</td>
                </tr>

                <tr>
                    <td>Nama User</td>
                    <td>:</td>
                    <td>{{$daftar_seller->name_user}}</td>
                </tr>

                <tr>
                    <td>Photo Ktp</td>
                    <td>:</td>
                    <td>
                        <img src="{{$daftar_seller->photo_ktp}}" width="50px" height="50px" alt="">
                    </td>
                </tr>

                <tr>
                    <td>Address Seller</td>
                    <td>:</td>
                    <td>{{$daftar_seller->address_seller}}</td>
                </tr>

                <tr>
                    <td>Latitude Seller</td>
                    <td>:</td>
                    <td>{{$daftar_seller->latitude}}</td>
                </tr>

                <tr>
                    <td>Longitude Seller</td>
                    <td>:</td>
                    <td>{{$daftar_seller->longitude}}</td>
                </tr>


            </table>
        </div>
        <div class="card-footer">
        </div>
      </div>
    </div>
  </div>
@endsection

