@extends('layouts.bootstrap')

@section('title')
Data Keranjang
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-success">
        <div class="card-header">
            <h3>Data Keranjang</h3>
        </div>
        <div class="card-body table-responsive">
            @include('alert.success')
            <br/>

            @if (Request::get('keyword'))
                <a href="{{route('keranjang.index')}}" class="btn btn-info">Back</a>
            @else

            @endif
                <hr />
            <form method="GET" action="{{route('keranjang.index')}}">
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
                    <th width="15%">Name Product</th>
                    <th width="15%">Quantity</th>
                    <th width="15%">Harga</th>
                    <th width="15%">Image</th>
                    <th width="30%">Action</th>
                </tr>
		</thead>
                <tbody>
                @foreach ($cart as $item )
                <tr>
                    <td>{{$loop->iteration + ($cart->perPage() * ($cart->currentPage() -1) )}}</td>
                    <td>{{$item->name_product}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->price}}</td>
                    <td>
                        <img src="{{$item->image}}" alt="" width="40px" height="40px" class="rounded mx-auto d-block">
                    </td>

                    <td>
                        <a href="{{route('keranjang.show', [$item->id] )}}" class="btn btn-primary btn-sm">Detail</a>
                        <form action="{{ route('keranjang.destroy', [$item->id]) }}" class="d-inline" method="POST" onsubmit="return confirm('Delete This Item ?')">
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
            {{$cart->appends(Request::all())->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection

