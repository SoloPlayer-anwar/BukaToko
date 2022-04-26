@extends('layouts.bootstrap')

@section('title')
Edit User
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
            <h3>Edit {{$users->name}}</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('users.update', [$users->id]) }}" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Username</label>
                    <input type="name" class="form-control {{$errors->first('name') ? 'is-invalid' : ''}}" name="name" id="name" placeholder="Enter name" value="{{ $users->name }}">
                    <span class="error invalid-feedback">{{$errors->first('name')}}</span>
                  </div>


                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" disabled id="email" placeholder="Enter email" value="{{ $users->email }}">
                  </div>


                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" disabled id="password" placeholder="Enter password" value="{{ $users->password }}">
                  </div>

                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="address" class="form-control {{$errors->first('address') ? 'is-invalid' : ''}}" name="address" id="address" placeholder="Enter address" value="{{ $users->address }}">
                    <span class="error invalid-feedback">{{$errors->first('address')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="phone">No Handphone</label>
                    <input type="phone" class="form-control {{$errors->first('phone') ? 'is-invalid' : ''}}" name="phone" id="phone" placeholder="Enter phone" value="{{ $users->phone }}">
                    <span class="error invalid-feedback">{{$errors->first('phone')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="house_number">House Number</label>
                    <input type="house_number" class="form-control {{$errors->first('house_number') ? 'is-invalid' : ''}}" name="house_number" id="house_number" placeholder="Enter house_number" value="{{ $users->house_number }}">
                    <span class="error invalid-feedback">{{$errors->first('house_number')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="latitude" class="form-control {{$errors->first('latitude') ? 'is-invalid' : ''}}" name="latitude" id="latitude" placeholder="Enter latitude" value="{{ $users->latitude }}">
                    <span class="error invalid-feedback">{{$errors->first('latitude')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="longitude" class="form-control {{$errors->first('longitude') ? 'is-invalid' : ''}}" name="longitude" id="longitude" placeholder="Enter longitude" value="{{$users->longitude }}">
                    <span class="error invalid-feedback">{{$errors->first('longitude')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="rt_rw">RT & RW</label>
                    <input type="rt_rw" class="form-control {{$errors->first('rt_rw') ? 'is-invalid' : ''}}" name="rt_rw" id="rt_rw" placeholder="Enter rt_rw" value="{{ $users->rt_rw }}">
                    <span class="error invalid-feedback">{{$errors->first('rt_rw')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <div class="input-group">
                        <img src="{{asset('uploads/' .$users->avatar)}}" width="40px" height="40px" alt="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="avatar"></label>
                    <input type="file" class="form-control {{$errors->first('avatar') ? 'is-invalid' : ''}}"
                    name="avatar" id="avatar">
                    <span class="error invalid-feedback">{{$errors->first('avatar')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control {{$errors->first('role') ?  'is-invalid' : ''}}">
                        <option value="admin" @if ($users->role == 'admin') selected @endif>Admin</option>
                        <option value="user" @if ($users->role == 'user') selected @endif>User</option>
                        <option value="kurir" @if ($users->role == 'kurir') selected @endif>Kurir</option>
                        <option value="seller" @if ($users->role == 'seller') selected @endif>Seller</option>
                    </select>
                    <span class="error invalid-feedback">{{$errors->first('role')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control {{$errors->first('status') ?  'is-invalid' : ''}}">
                        <option value="verify" @if ($users->status == 'verify') selected @endif>Verfikasi Success</option>
                        <option value="inverify" @if ($users->status == 'inverify') selected @endif>Belum Verifikasi</option>
                    </select>
                    <span class="error invalid-feedback">{{$errors->first('status')}}</span>
                  </div>

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Update User</button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection
