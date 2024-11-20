@extends('admin.layout')

@section('content')
<div class="container">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="/posts" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" name="id" class="form-control" id="id"
                            style="box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);" required>
                    </div>

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul"
                            style="box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);" required>
                    </div>

                    <div class="mb-3" style="margin-top: 2px;">
                        <label for="isi" style="color: black;">Isi</label>
                        <textarea class="form-control" id="isi" name="isi" required
                            style="box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);"></textarea>
                    </div>

                    <!-- Kategori ID dan Status Unggahan dalam satu baris -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kategori_id" class="form-label">Kategori</label>
                                <select name="kategori_id" id="kategori" class="form-control" required>

                                    @foreach ($categories as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="publish">Unggah</option>
                                    <option value="draft">Draf</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="mb-3">
                            <label for="map_link" style="color: black;">Map Link</label>
                            <input type="text" class="form-control" id="map_link" name="map_link"
                                value="{{ old('map_link', $post->map_link ?? '') }}"
                                style="box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="social_link" style="color: black;">Social Link</label>
                        <input type="text" class="form-control" name="social_link"
                            value="{{ old('social_link', $post->social_link ?? '') }}">
                    </div>





                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection