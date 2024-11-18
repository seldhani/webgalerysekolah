@extends('admin.layout')
@section('content')
<div class="container">
       
      <div class="container">
        <div class="card">
            <div class="card-body">
                <a href="/users/create" class="btn btn-primary">Admin</a>
                <table class="table">
                    <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th class="text-center">Aksi</th>
                    </tr>

                    @foreach ($petugas as $user)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $user->username}}</td>
                            <td class="d-flex justify-content-center">
                                <a href="/users/{{ $user->id }}/edit" class="btn btn-warning me-2">Edit</a>
                                <form action="/users/{{ $user->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm ('Apakah anda yakin?')">Hapus</button>
                                </form>
                            </td>
                        </tr>                    
                    @endforeach
                </table>
            </div>
        </div>
      </div>
    </div>
@endsection