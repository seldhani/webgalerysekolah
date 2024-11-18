@extends('admin.layout')
@section('content')

<div class="container">

    <!-- Section for Gallery -->
    <section id="about" class="about section" style="margin: 0; padding-top: 20px;">
        <div class="container">
            <h1><b>Data Unggahan</b></h1>

            @if($galery->isEmpty() || $galery->first()->foto->isEmpty())
                <div class="alert alert-warning">Tidak ada foto yang sesuai dengan kategori Galery Sekolah.</div>
            @else
                <div class="row gy-4">
                    @foreach ($galery as $galeryItem)
                        @foreach ($galeryItem->foto as $foto)
                            <div class="col-12 col-md-4">
                                <div class="card">
                                    <img src="{{ asset('images/' . $foto->file) }}" 
                                         alt="{{ $foto->judul }}" 
                                         class="img-fluid"
                                         data-bs-toggle="modal" 
                                         data-bs-target="#modal-{{ $foto->id }}"
                                         style="cursor: pointer;">
                                    <h5 class="mt-2 mx-3" style="font-family: 'Poppins', sans-serif;">{{ $foto->judul }}</h5>
                                </div>
                            </div>

                            <!-- Modal untuk setiap foto -->
                            <div class="modal fade" id="modal-{{ $foto->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ $foto->posts->judul ?? 'Tidak ada judul' }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('images/' . $foto->file) }}" alt="{{ $foto->judul }}" class="img-fluid mb-3">
                                            <div class="content">
                                                {!! $foto->posts->isi ?? 'Tidak ada konten' !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            @endif
        </div>
    </section>

</div>

@endsection
