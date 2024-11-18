@extends('admin.layout')

@section('content')
<div class="container">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <a href="/galery/create" class="btn btn-primary">+ Galery</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Post</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($galeries as $galery)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $galery->posts->judul }}</td>
                                <td>{{ $galery->position }}</td>
                                <td>{{ $galery->status }}</td>
                                <td class="d-flex justify-content-center">

                                    <a href="/galery/{{ $galery->id }}" class="btn btn-primary me-2">
                                    <i data-feather="info"></i>More</a>

                                    <a href="/galery/{{ $galery->id }}/edit" class="btn btn-warning me-2">Edit</a>
                                    <form action="/galery/{{ $galery->id }}" method="post">
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
