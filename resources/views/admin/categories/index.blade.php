@extends('admin.layout')

@section('content')
<div class="container">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <a href="/kategori/create" class="btn btn-primary">Kategori</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->judul }}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="/kategori/{{ $category->id }}/edit" class="btn btn-warning me-2">Edit</a>
                                    <form action="/kategori/{{ $category->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
