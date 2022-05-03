@extends('layouts.bootstrap')

@section('title')
Data Product
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-success">
        <div class="card-header">
            <h3>Data Product</h3>
        </div>
        <div class="card-body table-responsive">
            @include('alert.success')
            <br/>

            @if (Request::get('keyword'))
                <a href="{{route('product.index')}}" class="btn btn-info">Back</a>
            @else
            <a href="{{route('product.create')}}" class="btn btn-success"><i class="fas fa-plus"></i>
                Create Product
            </a>
            @endif
                <hr />
            <form method="GET" action="{{route('product.index')}}">
                <div class="row">
                    <div class="col-2">
                        <b>Search Name</b>
                    </div>

                    <div class="col-3">
                        <input type="text" name="keyword" id="keyword" class="form-control" value="{{Request::get('keyword')}}">
                    </div>

                    <div class="col-4">
                        <button class="btn btn-default" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <hr/>
            <table class="table table-bordered">
		<thead>
                <tr>
                    <th width="7%">No</th>
                    <th width="15%">Nama Product</th>
                    <th width="10%">Rate</th>
                    <th width="10%">Price</th>
                    <th width="10%">Image Satu</th>
                    <th width="10%">Image Dua</th>
                    <th width="10%">Image Tiga</th>
                    <th width="30%">Action</th>
                </tr>
		</thead>
                <tbody>
                @foreach ($data_product as $item )
                <tr>
                    <td>{{$loop->iteration + ($data_product->perPage() * ($data_product->currentPage() -1) )}}</td>
                    <td>{{$item->name_product}}</td>
                    <td>{{number_format($item->rate)}}</td>
                    <td>{{number_format($item->price)}}</td>
                    <td>
                        <img src="{{$item->image_satu}}" alt="" width="40px" height="40px" class="rounded mx-auto d-block">
                    </td>
                    <td>
                        <img src="{{$item->image_dua}}" alt="" width="40px" height="40px" class="rounded mx-auto d-block">
                    </td>

                    <td>
                        <img src="{{$item->image_tiga}}" alt="" width="40px" height="40px" class="rounded mx-auto d-block">
                    </td>
                    <td>
                        <a href="{{route('product.edit', [$item->id])}}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{route('product.show', [$item->id])}}" class="btn btn-primary btn-sm">Detail</a>
                        <form action="{{ route('product.destroy', [$item->id]) }}" class="d-inline" method="POST" onsubmit="return confirm('Delete This Item ?')">
                            @csrf
                            {{method_field('DELETE')}}
                            <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$data_product->appends(Request::all())->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection

