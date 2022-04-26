@extends('layouts.bootstrap')

@section('title')
Data Transaction
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-success">
        <div class="card-header">
            <h3>Data Transaction</h3>
        </div>
        <div class="card-body table-responsive">
            @include('alert.success')
            <br/>

            @if (Request::get('keyword'))
                <a href="{{route('transaction.index')}}" class="btn btn-info">Back</a>
            @else

            @endif
                <hr />
            <form method="GET" action="{{route('transaction.index')}}">
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
                    <th width="15%">Total</th>
                    <th width="15%">Username</th>
                    <th width="15%">Status</th>
                    <th width="30%">Action</th>
                </tr>
		</thead>
                <tbody>
                @foreach ($transaction as $item )
                <tr>
                    <td>{{$loop->iteration + ($transaction->perPage() * ($transaction->currentPage() -1) )}}</td>
                    <td>{{$item->product->name_product}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->total}}</td>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->status}}</td>
                    <td>
                        <a href="{{route('transaction.show', [$item->id] )}}" class="btn btn-primary btn-sm">Detail</a>
                        <form action="{{ route('transaction.destroy', [$item->id]) }}" class="d-inline" method="POST" onsubmit="return confirm('Delete This Item ?')">
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
            {{$transaction->appends(Request::all())->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection

