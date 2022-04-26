@extends('layouts.bootstrap')

@section('title')
Details Product
@endsection

@section('content')
<div class="row ">
    <div class="col-12">
      <div class="card card-success">
        <div class="card-header">
            <h3>Detail {{$data_product->name_product}}</h3>
        </div>
        <div class="card-body table-responsive">
            <a href="{{route('product.index')}}" class="btn btn-secondary">Back</a>
            <hr/>

            <table class="table table-bordered">
                <tr>
                    <td>Nama Product</td>
                    <td>:</td>
                    <td>{{$data_product->name_product}}</td>
                </tr>

                <tr>
                    <td>Description Product</td>
                    <td>:</td>
                    <td>{{$data_product->description_product}}</td>
                </tr>

                <tr>
                    <td>Rate</td>
                    <td>:</td>
                    <td>{{$data_product->rate}}</td>
                </tr>

                <tr>
                    <td>Price Product</td>
                    <td>:</td>
                    <td>{{$data_product->price}}</td>
                </tr>

                <tr>
                    <td>Kota Product</td>
                    <td>:</td>
                    <td>{{$data_product->city}}</td>
                </tr>


                <tr>
                    <td>Product Terjual</td>
                    <td>:</td>
                    <td>{{$data_product->terjual}}</td>
                </tr>

                <tr>
                    <td>Price Coret</td>
                    <td>:</td>
                    <td>{{$data_product->price_coret}}</td>
                </tr>

                <tr>
                    <td>Size Satu</td>
                    <td>:</td>
                    <td>{{$data_product->size_satu}}</td>
                </tr>


                <tr>
                    <td>Size Dua</td>
                    <td>:</td>
                    <td>{{$data_product->size_dua}}</td>
                </tr>

                <tr>
                    <td>Size Tiga</td>
                    <td>:</td>
                    <td>{{$data_product->size_tiga}}</td>
                </tr>

                <tr>
                    <td>Color Satu</td>
                    <td>:</td>
                    <td>{{$data_product->color_satu}}</td>
                </tr>

                <tr>
                    <td>Color Dua</td>
                    <td>:</td>
                    <td>{{$data_product->color_dua}}</td>
                </tr>

                <tr>
                    <td>Color Tiga</td>
                    <td>:</td>
                    <td>{{$data_product->color_tiga}}</td>
                </tr>

                <tr>
                    <td>Image Satu</td>
                    <td>:</td>
                    <td>
                        <img src="{{asset('uploads/'.$data_product->image_satu)}}" width="50px" height="50px" alt="">
                    </td>
                </tr>

                <tr>
                    <td>Image Dua</td>
                    <td>:</td>
                    <td>
                        <img src="{{asset('uploads/'.$data_product->image_dua)}}" width="50px" height="50px" alt="">
                    </td>
                </tr>


                <tr>
                    <td>Image Tiga</td>
                    <td>:</td>
                    <td>
                        <img src="{{asset('uploads/'.$data_product->image_tiga)}}" width="50px" height="50px" alt="">
                    </td>
                </tr>


                <tr>
                    <td>Tags</td>
                    <td>:</td>
                    <td>{{$data_product->tags}}</td>
                </tr>

                <tr>
                    <td>Category</td>
                    <td>:</td>
                    @foreach ($category as $categories)
                        @if ($categories->id == $data_product->category_id)
                            <td>{{$categories->name_category}}</td>
                        @endif

                    @endforeach
                </tr>

                <tr>
                    <td>Gudang</td>
                    <td>:</td>
                   @foreach ($gudang as $gudangs)
                        @if ($gudangs->id == $data_product->gudang_id)
                            <td>{{$gudangs->name_gudang}}</td>
                        @endif

                    @endforeach
                </tr>

                <tr>
                    <td>User</td>
                    <td>:</td>
                    @foreach ($user as $users)
                        @if ($users->id == $data_product->user_id)
                            <td>{{$users->role}}</td>
                        @endif

                    @endforeach
                </tr>


            </table>
        </div>
        <div class="card-footer">
        </div>
      </div>
    </div>
  </div>
@endsection

