@extends('layouts.bootstrap')

@section('title')
Details Cart Item
@endsection

@section('content')
<div class="row ">
    <div class="col-12">
      <div class="card card-success">
        <div class="card-header">
            <h3>Detail Keranjang {{$cart->user->name}}</h3>
        </div>
        <div class="card-body table-responsive">
            <a href="{{route('keranjang.index')}}" class="btn btn-secondary">Back</a>
            <hr/>

            <table class="table table-bordered">
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td>{{$cart->user->name}}</td>
                </tr>

                <tr>
                    <td>Name Product</td>
                    <td>:</td>
                    <td>{{$cart->name_product}}</td>
                </tr>

                <tr>
                    <td>Variant Product</td>
                    <td>:</td>
                    <td>{{$cart->varian_product}}</td>
                </tr>

                <tr>
                    <td>Quantity</td>
                    <td>:</td>
                    <td>{{$cart->quantity}}</td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td>:</td>
                    <td>{{$cart->price}}</td>
                </tr>

                <tr>
                    <td>Role</td>
                    <td>:</td>
                    <td>{{$cart->user->role}}</td>
                </tr>

                <tr>
                    <td>Photo Product</td>
                    <td>:</td>
                    <td>
                        <img src="{{$cart->image}}" width="50px" height="50px" alt="">
                    </td>

                </tr>


            </table>
        </div>
        <div class="card-footer">
        </div>
      </div>
    </div>
  </div>
@endsection

