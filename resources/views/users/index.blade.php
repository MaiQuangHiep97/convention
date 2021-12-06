@extends('layouts.user')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <h3 id="title-form">Add User</h3>
            <form method="POST" action="{{ url('user/store') }}">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Username">
                    @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email">
                    @error('email')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone number</label>
                    <input type="text" class="form-control" name="phone" placeholder="Phone number">
                    @error('phone')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group" id="pass">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    @error('password')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="radio" id="admin" name="roles" value="admin">
                    <label for="admin">Admin</label><br>
                    <input type="radio" id="css" name="roles" value="user">
                    <label for="user">User</label><br>
                    @error('roles')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <input type="submit" id="button" class="btn btn-primary" value="Add User">
            </form>
        </div>

        <div class="col-md-8">
            <h3>Show User</h3>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('false'))
                <div class="alert alert-danger">
                    {{ session('false') }}
                </div>
            @endif
            <table>
                <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </tbody>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($users as $user)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{$user->roles}}</td>
                            <td>
                                <form action="{{ url('user/edit', $user->id) }}" class="float-left">
                                    {{-- @csrf --}}
                                    <button class="update btn btn-sm btn-primary">Update</button>
                                </form>
                                <form action="{{ url('user/delete', $user->id) }}" method="POST" class="float-right">
                                    @csrf
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
