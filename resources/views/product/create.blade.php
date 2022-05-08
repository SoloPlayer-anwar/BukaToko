@extends('layouts.bootstrap')

@section('title')
Create Product
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <h3>Create Data Product</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name_product">Name Product</label>
                    <input type="text" class="form-control {{$errors->first('name_product') ? 'is-invalid' : ''}}" name="name_product" id="name_product" placeholder="Enter Nama Product" value="{{ old('name_product') }}">
                    <span class="error invalid-feedback">{{$errors->first('name_product')}}</span>
                  </div>


                  <div class="form-group">
                    <label for="description_product">Description</label>
                    <textarea class="form-control {{$errors->first('description_product') ? 'is-invalid' : ''}}" name="description_product" id="description_product" placeholder="Enter Description Product">{{ old('description_product') }}</textarea>
                    <span class="error invalid-feedback">{{$errors->first('description_product')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="rate">Rate</label>
                    <input type="number" class="form-control {{$errors->first('rate') ? 'is-invalid' : ''}}"
                    name="rate" id="rate" step="0.01" max="5">
                    <span class="error invalid-feedback">{{$errors->first('rate')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control {{$errors->first('price') ? 'is-invalid' : ''}}"
                    name="price" id="price">
                    <span class="error invalid-feedback">{{$errors->first('price')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="city">Kota Product</label>
                    <input type="text" class="form-control {{$errors->first('city') ? 'is-invalid' : ''}}" placeholder="Enter Kota Product"
                    name="city" id="city">
                    <span class="error invalid-feedback">{{$errors->first('city')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="terjual">Product Terjual</label>
                    <input type="text" class="form-control {{$errors->first('terjual') ? 'is-invalid' : ''}}" placeholder="Enter Terjual Product"
                    name="terjual" id="terjual">
                    <span class="error invalid-feedback">{{$errors->first('terjual')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="price_coret">Price Coret</label>
                    <input type="number" class="form-control {{$errors->first('price_coret') ? 'is-invalid' : ''}}"
                    name="price_coret" id="price_coret">
                    <span class="error invalid-feedback">{{$errors->first('price_coret')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="size_satu">Size Pertama</label>
                    <input type="text" class="form-control {{$errors->first('terjual') ? 'is-invalid' : ''}}" placeholder="Enter Size Pertama"
                    name="size_satu" id="size_satu">
                    <span class="error invalid-feedback">{{$errors->first('size_satu')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="size_dua">Size Dua</label>
                    <input type="text" class="form-control {{$errors->first('size_dua') ? 'is-invalid' : ''}}" placeholder="Enter Size Kedua"
                    name="size_dua" id="size_dua">
                    <span class="error invalid-feedback">{{$errors->first('size_dua')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="size_tiga">Size Tiga</label>
                    <input type="text" class="form-control {{$errors->first('size_tiga') ? 'is-invalid' : ''}}" placeholder="Enter Size Ketiga"
                    name="size_tiga" id="size_tiga">
                    <span class="error invalid-feedback">{{$errors->first('size_tiga')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="color_satu">Color Pertama</label>
                    <input type="text" class="form-control {{$errors->first('color_satu') ? 'is-invalid' : ''}}" placeholder="Enter Color Pertama"
                    name="color_satu" id="color_satu">
                    <span class="error invalid-feedback">{{$errors->first('color_satu')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="color_dua">Color Kedua</label>
                    <input type="text" class="form-control {{$errors->first('color_dua') ? 'is-invalid' : ''}}" placeholder="Enter Color Dua"
                    name="color_dua" id="color_dua">
                    <span class="error invalid-feedback">{{$errors->first('color_dua')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="color_tiga">Color Tiga</label>
                    <input type="text" class="form-control {{$errors->first('color_tiga') ? 'is-invalid' : ''}}" placeholder="Enter Color Tiga"
                    name="color_tiga" id="color_tiga">
                    <span class="error invalid-feedback">{{$errors->first('color_tiga')}}</span>
                  </div>


                  <div class="form-group">
                    <label for="image_satu">Image Pertama</label>
                    <input type="file" class="form-control {{$errors->first('image_satu') ? 'is-invalid' : ''}}"
                    name="image_satu" id="image_satu">
                    <span class="error invalid-feedback">{{$errors->first('image_satu')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="image_dua">Image Kedua</label>
                    <input type="file" class="form-control {{$errors->first('image_dua') ? 'is-invalid' : ''}}"
                    name="image_dua" id="image_dua">
                    <span class="error invalid-feedback">{{$errors->first('image_dua')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="image_tiga">Image Ketiga</label>
                    <input type="file" class="form-control {{$errors->first('image_tiga') ? 'is-invalid' : ''}}"
                    name="image_tiga" id="image_tiga">
                    <span class="error invalid-feedback">{{$errors->first('image_tiga')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="tags">Tags</label>
                    <input type="text" class="form-control {{$errors->first('tags') ? 'is-invalid' : ''}}" placeholder="Enter Tags"
                    name="tags" id="tags">
                    <span class="error invalid-feedback">{{$errors->first('tags')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach ($category as $categories )
                        <option value="{{$categories->id}}">{{$categories->name_category}}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="gudang_id">Gudang</label>
                    <select name="gudang_id" id="gudang_id" class="form-control ">
                        @foreach ($gudang as $gudangs )
                        <option value="{{$gudangs->id}}">{{$gudangs->name_gudang}}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="user_id">User</label>
                    <select name="user_id" id="user_id" class="form-control">
                        @foreach ($user as $users )
                        <option value="{{$users->id}}">{{$users->role}}</option>
                        @endforeach
                    </select>

                  </div>

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save Product</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection

