@extends('layouts.bootstrap')

@section('title')
Details Transaction
@endsection

@section('content')
<div class="row ">
    <div class="col-12">
      <div class="card card-success">
        <div class="card-header">
            <h3>Detail {{$transaction->user->name}}</h3>
        </div>
        <div class="card-body table-responsive">
            <a href="{{route('transaction.index')}}" class="btn btn-secondary">Back</a>
            <hr/>

            <table class="table table-bordered">
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td>{{$transaction->user->name}}</td>
                </tr>

                <tr>
                    <td>Product</td>
                    <td>:</td>
                    <td>{{$transaction->product->name_product}}</td>
                </tr>

                <tr>
                    <td>Quantity</td>
                    <td>:</td>
                    <td>{{$transaction->quantity}}</td>
                </tr>

                <tr>
                    <td>Total</td>
                    <td>:</td>
                    <td>{{$transaction->total}}</td>
                </tr>

                <tr>
                    <td>Nomor Resi</td>
                    <td>:</td>
                    <td>{{$transaction->no_resi}}</td>
                </tr>

                <tr>
                    <td>variant Product</td>
                    <td>:</td>
                    <td>{{$transaction->varian_product}}</td>
                </tr>

                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{$transaction->address}}</td>
                </tr>

                <tr>
                    <td>Latitude</td>
                    <td>:</td>
                    <td>{{$transaction->latitude}}</td>
                </tr>

                <tr>
                    <td>Longitude</td>
                    <td>:</td>
                    <td>{{$transaction->longitude}}</td>
                </tr>

                <tr>
                    <td>Phone</td>
                    <td>:</td>
                    <td>{{$transaction->phone}}</td>
                </tr>

                <tr>
                    <td>Pengiriman</td>
                    <td>:</td>
                    <td>{{$transaction->pengiriman}}</td>
                </tr>

                <tr>
                    <td>Photo Product</td>
                    <td>:</td>
                    <td>
                        <img src="{{$transaction->product->image_satu}}" width="50px" height="50px" alt="">
                        <img src="{{$transaction->product->image_dua}}" width="50px" height="50px" alt="">
                        <img src="{{$transaction->product->image_tiga}}" width="50px" height="50px" alt="">
                    </td>

                </tr>

                <tr>
                    <td>Payment </td>
                    <td>:</td>
                    <td>{{$transaction->payment_url}}</td>
                </tr>

                <tr>
                    <div class="form-group">
                        <a class="btn btn-sm btn-success" href="{{route('transaction.changeStatus', ['id' => $transaction->id, 'status' => 'PENDING'])}}">PENDING</a>
                      </div>
                </tr>

                <tr>
                    <div class="form-group">
                        <a class="btn btn-sm btn-success" href="{{route('transaction.changeStatus', ['id' => $transaction->id, 'status' => 'SEDANG DI ANTAR'])}}">SEDANG DI ANTAR</a>
                      </div>
                </tr>

                <tr>
                    <div class="form-group">
                        <a class="btn btn-sm btn-success" href="{{route('transaction.changeStatus', ['id' => $transaction->id, 'status' => 'SUCCESS'])}}">SUCCESS</a>
                      </div>
                </tr>

            </table>
        </div>
        <div class="card-footer">
        </div>
      </div>
    </div>
  </div>
@endsection

