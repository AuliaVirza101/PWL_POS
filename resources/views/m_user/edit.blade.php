@extends('m_user/template')
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit User</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('m_user.index') }}">
                    Kembali </a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        .
        <div class="alert alert-danger">
            <strong>Ops!</strong> Error <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('m_user.update', $useri->user_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>User_id:</strong>
                    <input type="text" name="userid" value="{{ $useri->user_id }}" class="form-control"
                        placeholder="Masukkan user id">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Level_id: </strong>
                    <input type="text" name="levelid" value="{{ $useri->level_id }}" class="form-control"
                        placeholder="Masukkan level">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Username:</strong>
                    <input type="text" value= "{{ $useri->username }}" class="form-control" name="username"
                        placeholder="Enter Username number",">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>nama:</strong>
                    <input type="text" value= "{{ $useri->name }}"name="name" class="form-control"
                        placeholder="Enter name"></input>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" value= "{{ $useri->password }}"name="password" class="form-control"
                        placeholder="Masukkan password"></input>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
@endsection
 48 changes: 48 additions & 0 deletions48
resources/views/m_user/index.blade.php
@@ -0,0 +1,48 @@
@extends('m_user/template')
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>CRUD user</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('m_user.create') }}"> Input User</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">User id</th>
            <th width="150px" class="text-center">Level id</th>
            <th width="200px"class="text-center">username</th>
            <th width="200px"class="text-center">nama</th>
            <th width="150px"class="text-center">password</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach ($useri as $m_user)
            <tr>
                <td>{{ $m_user->user_id }}</td>
                <td>{{ $m_user->level_id }}</td>
                <td>{{ $m_user->username }}</td>
                <td>{{ $m_user->nama }}</td>
                <td>{{ $m_user->password }}</td>
                <td class="text-center">
                    <div class="btn-group" role="group" aria-label="User Actions">
                        <a class="btn btn-info btn-sm mr-2" href="{{ route('m_user.show', $m_user->user_id) }}">Show</a>
                        <a class="btn btn-primary btn-sm mr-2" href="{{ route('m_user.edit', $m_user->user_id) }}">Edit</a>
                        <form action="{{ route('m_user.destroy', $m_user->user_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this data?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </borð>
    @endsection