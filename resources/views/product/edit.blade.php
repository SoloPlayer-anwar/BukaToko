@extends('layouts.bootstrap')

@section('title')
Edit Product
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <h3>Edit {{$data_product->name_product}}</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('product.update', [$data_product->id]) }}" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="name_product">Name Product</label>
                    <input type="text" class="form-control {{$errors->first('name_product') ? 'is-invalid' : ''}}" name="name_product" id="name_product" placeholder="Enter Nama Product" value="{{ $data_product->name_product }}">
                    <span class="error invalid-feedback">{{$errors->first('name_product')}}</span>
                  </div>


                  <div class="form-group">
                    <label for="description_product">Description Product</label>
                    <input type="text" class="form-control {{$errors->first('description_product') ? 'is-invalid' : ''}}" name="description_product"  id="description_product" placeholder="Enter Description Product" value="{{ $data_product->description_product }}">
                  </div>

                  <div class="form-group">
                    <label for="rate">Rate</label>
                    <input type="number" class="form-control {{$errors->first('rate') ? 'is-invalid' : ''}}" name="rate"  id="rate" placeholder="Enter Description Product" value="{{ $data_product->rate }}" step="0.01" max="5">
                  </div>

                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control {{$errors->first('price') ? 'is-invalid' : ''}}" name="price"  id="price" placeholder="Enter Description Product" value="{{ $data_product->price }}">
                  </div>

                  <div class="form-group">
                    <label for="city">Kota Product</label>
                    <input type="text" class="form-control {{$errors->first('city') ? 'is-invalid' : ''}}" name="city"  id="city" placeholder="Enter Kota Product" value="{{ $data_product->city }}">
                  </div>

                  <div class="form-group">
                    <label for="terjual">Product Terjual</label>
                    <input type="text" class="form-control {{$errors->first('terjual') ? 'is-invalid' : ''}}" name="terjual"  id="terjual" placeholder="Enter Product Terjual" value="{{ $data_product->terjual }}">
                  </div>

                  <div class="form-group">
                    <label for="price_coret">Price Coret</label>
                    <input type="number" class="form-control {{$errors->first('price_coret') ? 'is-invalid' : ''}}" name="price_coret"  id="price_coret" placeholder="Enter Price Coret" value="{{ $data_product->price_coret }}">
                  </div>

                  <div class="form-group">
                    <label for="size_satu">Size Satu</label>
                    <input type="text" class="form-control {{$errors->first('size_satu') ? 'is-invalid' : ''}}" name="size_satu"  id="size_satu" placeholder="Enter Size Satu" value="{{ $data_product->size_satu }}">
                  </div>

                  <div class="form-group">
                    <label for="size_dua">Size Dua</label>
                    <input type="text" class="form-control {{$errors->first('size_dua') ? 'is-invalid' : ''}}" name="size_dua"  id="size_dua" placeholder="Enter Size Dua" value="{{ $data_product->size_dua }}">
                  </div>

                  <div class="form-group">
                    <label for="size_tiga">Size Tiga</label>
                    <input type="text" class="form-control {{$errors->first('size_tiga') ? 'is-invalid' : ''}}" name="size_tiga"  id="size_tiga" placeholder="Enter Size Tiga" value="{{ $data_product->size_tiga }}">
                  </div>

                  <div class="form-group">
                    <label for="color_satu">Color Satu</label>
                    <input type="text" class="form-control {{$errors->first('color_satu') ? 'is-invalid' : ''}}" name="color_satu"  id="color_satu" placeholder="Enter Color Satu" value="{{ $data_product->color_satu }}">
                  </div>


                  <div class="form-group">
                    <label for="color_dua">Color Dua</label>
                    <input type="text" class="form-control {{$errors->first('color_dua') ? 'is-invalid' : ''}}" name="color_dua"  id="color_dua" placeholder="Enter Color Dua" value="{{ $data_product->color_dua }}">
                  </div>


                  <div class="form-group">
                    <label for="color_tiga">Color Tiga</label>
                    <input type="text" class="form-control {{$errors->first('color_tiga') ? 'is-invalid' : ''}}" name="color_tiga"  id="color_tiga" placeholder="Enter Color Tiga" value="{{ $data_product->color_tiga }}">
                  </div>

                  <div class="form-group">
                    <label for="tags">Tags</label>
                    <input type="text" class="form-control {{$errors->first('tags') ? 'is-invalid' : ''}}" name="tags"  id="tags" placeholder="Enter Color Dua" value="{{ $data_product->tags }}">
                  </div>


                  <div class="form-group">
                    <label for="image_satu">Image Satu</label>
                    <div class="input-group">
                        <img src="{{$data_product->image_satu}}" width="40px" height="40px" alt="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="image_satu"></label>
                    <input type="file" class="form-control {{$errors->first('image_satu') ? 'is-invalid' : ''}}"
                    name="image_satu" id="image_satu">
                    <span class="error invalid-feedback">{{$errors->first('image_satu')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="image_dua">Image Dua</label>
                    <div class="input-group">
                        <img src="{{$data_product->image_dua}}" width="40px" height="40px" alt="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="image_dua"></label>
                    <input type="file" class="form-control {{$errors->first('image_dua') ? 'is-invalid' : ''}}"
                    name="image_dua" id="image_dua">
                    <span class="error invalid-feedback">{{$errors->first('image_dua')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="image_tiga">Image Tiga</label>
                    <div class="input-group">
                        <img src="{{$data_product->image_tiga}}" width="40px" height="40px" alt="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="image_tiga"></label>
                    <input type="file" class="form-control {{$errors->first('image_tiga') ? 'is-invalid' : ''}}"
                    name="image_tiga" id="image_tiga">
                    <span class="error invalid-feedback">{{$errors->first('image_tiga')}}</span>
                  </div>


                  <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach ($category as $categories )
                        <option value="{{$categories->id}}" @if ($data_product->category_id == $categories->id)
                        selected
                        @endif>{{$categories->name_category}}</option>
                        @endforeach
                    </select>
                    <span class="error invalid-feedback">{{$errors->first('category_id')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="gudang_id">Gudang</label>
                    <select name="gudang_id" id="gudang_id" class="form-control ">
                        @foreach ($gudang as $gudangs )
                        <option value="{{$gudangs->id}}" @if ($data_product->gudang_id == $gudangs->id) selected
                        @endif>{{$gudangs->name_gudang}}</option>
                        @endforeach
                    </select>
                    <span class="error invalid-feedback">{{$errors->first('gudang_id')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="user_id">User</label>
                    <select name="user_id" id="user_id" class="form-control">
                        @foreach ($user as $users )
                        <option value="{{$users->id}}" @if ($data_product->user_id == $users->id) selected
                        @endif>{{$users->role}}</option>
                        @endforeach
                    </select>
                    <span class="error invalid-feedback">{{$errors->first('user_id')}}</span>
                  </div>



                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Update Product</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection
