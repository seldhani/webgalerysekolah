@extends('admin.layout')

@section('content')
<div class="container">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="/galery/{{ $galery->id }}" method="POST"> <!-- Ubah URL di sini -->
                    @csrf
                    @method('PUT') <!-- Pastikan ini tetap ada untuk PUT request -->

                    <div class="form-group mb-3">
                        <label for="post_id">Judul Post</label>
                        <select name="post_id" class="form-control" id="post_id" required>
                            @foreach ($posts as $post)
                                <option value="{{ $post->id }}" 
                                    @if($post->id == $galery->post_id) selected @endif>
                                    {{ $post->judul }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="position" class="form-label">Posisi</label>
                                <input type="number" name="position" class="form-control" id="position"
                                    placeholder="0" required value="{{ $galery->position }}">
                                <small>Input dengan angka</small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" class="form-control" id="status" required>
                                    <option value="1" @if($galery->status == 1) selected @endif>Published</option>
                                    <option value="0" @if($galery->status == 0) selected @endif>Drafted</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
