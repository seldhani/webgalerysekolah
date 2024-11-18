@extends('admin.layout')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="/users/{{ $petugas->id }}" method="post">
                @csrf
                @method('put')

                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $petugas->username }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" value="{{ $petugas->password }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection
