@extends('layouts.bootstrap')

@section('title')
Data Komentar
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-success">
        <div class="card-header">
            <h3>Data Komentar</h3>
        </div>
        <div class="card-body table-responsive">
            @include('alert.success')
            <br/>

            @if (Request::get('keyword'))
                <a href="{{route('komentar.index')}}" class="btn btn-info">Back</a>
            @else
            @endif
                <hr />
            <form method="GET" action="{{route('komentar.index')}}">
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
                    <th width="15%">Nama Komentar</th>
                    <th width="15%">Komentar User</th>
                    <th width="15%">Photo</th>
                    <th width="15%">Rating Comment</th>
                    <th width="30%">Action</th>
                </tr>
		</thead>
                <tbody>
                @foreach ($komentar as $item )
                <tr>
                    <td>{{$loop->iteration + ($komentar->perPage() * ($komentar->currentPage() -1) )}}</td>
                    <td>{{$item->name_comment}}</td>
                    <td>{{$item->comment}}</td>
                    <td>
                        <img src="{{$item->photo_comment}}" width="100px" height="100px">
                    <td>{{$item->rate_comment}}</td>

                    <td>
                        <a href="{{route('komentar.edit', [$item->id])}}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{route('komentar.show', [$item->id] )}}" class="btn btn-primary btn-sm">Detail</a>
                        <form action="{{ route('komentar.destroy', [$item->id]) }}" class="d-inline" method="POST" onsubmit="return confirm('Delete This Item ?')">
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
            {{$komentar->appends(Request::all())->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection

