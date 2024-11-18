@extends('admin.layout')

@section('content')

<div class="row">
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <a href="/galery" class="btn btn-primary mb-3">Back</a>
                <table class="table">
                    <tr>
                        <td>Judul Post</td>
                        <td>:</td>
                        <td>{{ $galery->posts->judul }}</td>
                    </tr>

                    <tr>
                        <td>Posisi</td>
                        <td>:</td>
                        <td>{{ $galery->position }}</td>
                    </tr>

                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                            @if($galery->status == 1)
                                <span class="badge badge-success text-dark">Published</span>
                            @else
                                <span class="badge badge-danger text-dark">Drafted</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>Dibuat pada</td>
                        <td>:</td>
                        <td>{{ \Carbon\Carbon::parse($galery->created_at)->format('d-m-y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-8">
        <div class="card">
            <div class="card-header">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TambahFotoModal">
                    + Foto
                </button>

                <!-- Modal -->
                <div class="modal fade" id="TambahFotoModal" tabindex="-1" aria-labelledby="TambahFotoModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <form action="/foto/store" method="POST" enctype="multipart/form-data" class="modal-content">
                            @csrf
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="TambahFotoModalLabel">Tambah Foto</h1>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="galery_id" value="{{ $galery->id }}">
                                <div class="mb-3">
                                    <label for="file">Foto</label>
                                    <input type="file" name="file" id="file" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="judul">Judul</label>
                                    <input type="text" name="judul" id="judul" class="form-control"
                                        style="box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="m-0 p-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="card-body">
                <div class="row">
                    @forelse ($galery->foto as $foto)
                        <div class="col-12 col-md-4">
                            <div class="card">
                                <img src="{{ asset('images/' . $foto->file) }}" alt="{{ $foto->judul }}" class="img-fluid">
                                <p> {{ $foto->judul }}</p>

                                <form action="/foto/{{ $foto->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm ('Apakah anda yakin?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning">Foto tidak ada</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

@endsection