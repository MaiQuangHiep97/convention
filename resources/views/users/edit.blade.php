@extends('layouts.user')
@section('content')
    <div class="row row-update">
        <div class="col-md-12" id="update">
            <h3 id="title-form">Update User</h3>
            <form method="POST" action="{{ url('user/update', $user->id) }}">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" value="{{ $user->name }}" name="name" id="username"
                        placeholder="Enter Username">
                    @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" value="{{ $user->email }}" name="email" id="email" disabled
                        placeholder="Enter email">
                    @error('email')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone number</label>
                    <input type="text" class="form-control" value="{{ $user->phone }}" name="phone" id="phone"
                        placeholder="Phone number">
                    @error('phone')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="radio" id="admin" name="roles" {{$user->roles == 'admin'?'checked':''}} value="admin">
                    <label for="admin">Admin</label><br>
                    <input type="radio" id="css" name="roles" {{$user->roles == 'user'?'checked':''}} value="user">
                    <label for="user">User</label><br>
                    @error('roles')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <input type="submit" id="button" class="btn btn-primary" value="Update User">
            </form>
        </div>
    </div>
@endsection
