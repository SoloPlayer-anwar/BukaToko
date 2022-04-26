@extends('layouts.bootstrap')

@section('title')
Data Gudang
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-success">
        <div class="card-header">
            <h3>Data Gudang</h3>
        </div>
        <div class="card-body table-responsive">
            @include('alert.success')
            <br/>

            @if (Request::get('keyword'))
                <a href="{{route('gudang.index')}}" class="btn btn-info">Back</a>
            @else
            <a href="{{route('gudang.create')}}" class="btn btn-success"><i class="fas fa-plus"></i>
                Create Gudang
            </a>
            @endif
                <hr />
            <form method="GET" action="{{route('gudang.index')}}">
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
                    <th width="15%">Name Gudang</th>
                    <th width="15%">Alamat Gudang</th>
                    <th width="15%">Photo Gudang</th>
                    <th width="15%">Status Gudang</th>
                    <th width="15%">Promo Gudang</th>
                    <th width="30%">Action</th>
                </tr>
		</thead>
                <tbody>
                @foreach ($data_gudang as $item )
                <tr>
                    <td>{{$loop->iteration + ($data_gudang->perPage() * ($data_gudang->currentPage() -1) )}}</td>
                    <td>{{$item->name_gudang}}</td>
                    <td>{{$item->address_gudang}}</td>
                    <td>
                        <img src="{{asset('uploads/'.$item->photo_gudang)}}" alt="" width="40px" height="40px" class="rounded mx-auto d-block">
                    </td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->promo}}</td>
                    <td>
                        <a href="{{route('gudang.edit', [$item->id])}}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{route('gudang.show', [$item->id] )}}" class="btn btn-primary btn-sm">Detail</a>
                        <form action="{{ route('gudang.destroy', [$item->id]) }}" class="d-inline" method="POST" onsubmit="return confirm('Delete This Item ?')">
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
            {{$data_gudang->appends(Request::all())->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection

