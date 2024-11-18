@extends('admin.layout')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="/kategori/{{ $kategori->id }}" method="post">
                @csrf
                @method('put')

                <div class="form-group mb-3">
                    <label for="name">Judul</label>
                    <input type="text" name="judul" class="form-control" id="name" value="{{ $kategori->judul }}" required>
</div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection
