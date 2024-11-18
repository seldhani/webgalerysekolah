@extends('admin.layout')

@section('content')
<div class="container">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <a href="/posts/create" class="btn btn-primary mb-3">Post</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th style="width: 300px">Isi</th>
                                <th>Petugas</th>
                                <th>Status</th>
                                <th>Dibuat pada</th>
                                <th style="min-width: 180px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post->judul }}</td>
                                    <td>{{ $post->kategori->judul }}</td>
                                    <td style="max-width: 300px; overflow: hidden;">
                                        @if (strlen($post->isi) > 100)
                                            <div class="text-truncate">
                                                {{ substr($post->isi, 0, 100) }}...
                                            </div>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#post-{{ $post->id }}">Selanjutnya</a>

                                            <!-- Modal untuk menampilkan isi lengkap -->
                                            <div class="modal fade" id="post-{{ $post->id }}" tabindex="-1" aria-labelledby="postLabel-{{ $post->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="postLabel-{{ $post->id }}">Isi</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{ $post->isi }}
                                                        </div>
                                                        <div class="modal-footer">
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            {{ $post->isi }}
                                        @endif
                                    </td>
                                    <td>{{ $post->petugas->username ?? 'Tidak ada petugas' }}</td>
                                    <td>{{ $post->status }}</td>
                                    <td>{{ \Carbon\Carbon::parse($post->created_at)->format('d-m-y H:i')}}</td>

                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="/posts/{{ $post->id }}/edit" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                                onsubmit="return confirm('Apakah anda yakin?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
