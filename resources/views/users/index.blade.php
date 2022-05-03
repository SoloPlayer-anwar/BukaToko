@extends('layouts.bootstrap')

@section('title')
Data User
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-success">
        <div class="card-header">
            <h3>Data Users</h3>
        </div>
        <div class="card-body table-responsive">
            @include('alert.success')
            <br/>

            @if (Request::get('keyword'))
                <a href="{{route('users.index')}}" class="btn btn-info">Back</a>
            @else
            <a href="{{route('users.create')}}" class="btn btn-success"><i class="fas fa-plus"></i>
                Create User
            </a>
            @endif
                <hr />
            <form method="GET" action="{{route('users.index')}}">
                <div class="row">
                    <div class="col-2">
                        <b>Search Name</b>
                    </div>

                    <div class="col-3">
                        <input type="text" name="keyword" id="keyword" class="form-control" value="{{Request::get('keyword')}}">
                    </div>

                    <div class="col-3">
                        <select name="role" id="role" class="form-control">
                            <option value="admin" @if (Request::get('role') == 'admin') selected @endif>Admin</option>
                            <option value="user" @if (Request::get('role') == 'user') selected @endif>User</option>
                            <option value="kurir" @if (Request::get('role') == 'kurir') selected @endif>Kurir</option>
                            <option value="seller" @if (Request::get('role') == 'seller') selected @endif>Seller</option>
                        </select>
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
                    <th width="15%">Name</th>
                    <th width="15%">Email</th>
                    <th width="15%">Avatar</th>
                    <th width="15%">role</th>
                    <th width="10%">Status</th>
                    <th width="30%">Action</th>
                </tr>
		</thead>
                <tbody>
                @foreach ($users as $item )
                <tr>
                    <td>{{$loop->iteration + ($users->perPage() * ($users->currentPage() -1) )}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>
                        <img src="{{$item->avatar}}" alt="" width="40px" height="40px" class="rounded mx-auto d-block">
                    </td>
                    <td>{{$item->role}}</td>
                    <td>{{$item->status}}</td>
                    <td>
                        <a href="{{route('users.edit', [$item->id])}}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{route('users.show', [$item->id] )}}" class="btn btn-primary btn-sm">Detail</a>
                        <form action="{{ route('users.destroy', [$item->id]) }}" class="d-inline" method="POST" onsubmit="return confirm('Delete This Item ?')">
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
            {{$users->appends(Request::all())->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection

