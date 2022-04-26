@extends('layouts.bootstrap')

@section('title')
Data Upload Status
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-success">
        <div class="card-header">
            <h3>Data Upload Status</h3>
        </div>
        <div class="card-body table-responsive">
            @include('alert.success')
            <br/>

            @if (Request::get('keyword'))
                <a href="{{route('upload_status.index')}}" class="btn btn-info">Back</a>
            @else
            <a href="{{route('upload_status.create')}}" class="btn btn-success"><i class="fas fa-plus"></i>
                Create Upload Status
            </a>
            @endif
                <hr />
            <form method="GET" action="{{route('upload_status.index')}}">
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
                    <th width="15%">Name User</th>
                    <th width="15%">Photo User</th>
                    <th width="15%">Judul</th>
                    <th width="30%">Action</th>
                </tr>
		</thead>
                <tbody>
                @foreach ($upload_status as $item )
                <tr>
                    <td>{{$loop->iteration + ($upload_status->perPage() * ($upload_status->currentPage() -1) )}}</td>
                    <td>{{$item->name_user}}</td>
                    <td>
                        <img src="{{asset('uploads/'.$item->photo_user)}}" alt="" width="40px" height="40px" class="rounded mx-auto d-block">
                    </td>
                    <td>{{$item->judul}}</td>
                    <td>
                        <a href="{{route('upload_status.edit', [$item->id])}}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{route('upload_status.show', [$item->id] )}}" class="btn btn-primary btn-sm">Detail</a>
                        <form action="{{ route('upload_status.destroy', [$item->id]) }}" class="d-inline" method="POST" onsubmit="return confirm('Delete This Item ?')">
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
            {{$upload_status->appends(Request::all())->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection

