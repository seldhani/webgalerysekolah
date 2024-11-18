@extends('admin.layout')

@section('content')
<div class="container">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="/kategori" method="POST">
                    @csrf

                    <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" name="id" class="form-control" id="id" 
                    style="outline: 2px black; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);"
                    required>
                    </div>

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" 
                        style="outline: 2px black; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);"
                        required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
