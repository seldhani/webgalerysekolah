@extends('admin.layout')
@section('content')


<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="/users" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label form="id">ID</label>
                    <input type="text" name="id" class="form-control" id="id" 
                    style="outline: 2px black; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);"
                    required>

                </div>

                <div class="form-group mb-3">
                    <label form="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" 
                    style="outline: 2px black; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);"
                    required>
                </div>

                <div class="form-group mb-3">
                    <label form="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" 
                    style="outline: 2px black; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);"
                    required>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
