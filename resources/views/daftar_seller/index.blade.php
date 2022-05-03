@extends('layouts.bootstrap')

@section('title')
Data Daftar Seller
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-success">
        <div class="card-header">
            <h3>Data Daftar Seller</h3>
        </div>
        <div class="card-body table-responsive">
            @include('alert.success')
            <br/>

            @if (Request::get('keyword'))
                <a href="{{route('daftar_seller.index')}}" class="btn btn-info">Back</a>
            @else

            @endif
                <hr />
            <form method="GET" action="{{route('daftar_seller.index')}}">
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
                    <th width="15%">Nama Toko</th>
                    <th width="15%">Photo KTP</th>
                    <th width="15%">Alamat Seller</th>
                    <th width="15%">Name User</th>\
                    <th width="30%">Action</th>
                </tr>
		</thead>
                <tbody>
                @foreach ($daftar_seller as $item )
                <tr>
                    <td>{{$loop->iteration + ($daftar_seller->perPage() * ($daftar_seller->currentPage() -1) )}}</td>
                    <td>{{$item->name_toko}}</td>

                    <td>
                        <img src="{{$item->photo_ktp}}" alt="" width="40px" height="40px" class="rounded mx-auto d-block">
                    </td>

                    <td>{{$item->address_seller}}</td>
                    <td>{{$item->name_user}}</td>

                    <td>
                        <a href="{{route('daftar_seller.edit', [$item->id])}}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('daftar_seller.destroy', [$item->id]) }}" class="d-inline" method="POST" onsubmit="return confirm('Delete This Item ?')">
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
            {{$daftar_seller->appends(Request::all())->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection

