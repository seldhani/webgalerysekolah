@extends('admin.layout')

@section('content')
<div class="container">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="/galery" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="post_id">Judul Post</label>
                        <select name="post_id" class="form-control" id="post_id" required>
                            @foreach ($posts as $post)
                                <option value="{{ $post->id }}">{{ $post->judul }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="position" class="form-label">Kategori</label>
                                <input type="number" name="position" class="form-control" id="position"
                                    placeholder="0" required>
                                <small>Input dengan angka</small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" class="form-control" id="status" required>
                                    <option value="1">Published</option>
                                    <option value="0">Drafted</option>
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
