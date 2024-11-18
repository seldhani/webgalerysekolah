@extends('welcome')

@section('informasi')


<section id="informasi" class="informasi section">
    <div class="container">
        <h1><b>Informasi Sekolah</b></h1>
        @if($galery->isEmpty())
            <div class="alert alert-warning">Tidak ada foto untuk Informasi Sekolah.</div>
        @else
            <div class="row gy-4">
                @foreach ($galery as $galeryItem)
                    @foreach ($galeryItem->foto as $foto)
                        <div class="col-12 col-md-4">
                            <div class="card">
                                <img src="{{ asset('images/' . $foto->file) }}" alt="{{ $foto->judul }}" class="img-fluid" data-bs-toggle="modal" data-bs-target="#modal-{{ $foto->id }}" style="cursor: pointer;">
                                <h5 class="mt-2 mx-3" style="font-family: 'Poppins', sans-serif;">{{ $foto->judul }}</h5>
                            </div>
                        </div>

                        <!-- Modal untuk setiap foto -->
                        <div class="modal fade" id="modal-{{ $foto->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        
                                        <h5 class="modal-title">
                                            @if($foto->posts)
                                                {{ $foto->posts->judul }}
                                            @else
                                                Tidak ada judul
                                            @endif
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <img src="{{ asset('images/' . $foto->file) }}" alt="{{ $foto->judul }}" class="img-fluid">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="content">
                                                    @if($foto->posts)
                                                        {!! $foto->posts->isi !!}
                                                    @else
                                                        Tidak ada konten
                                                    @endif
                                                </div>
                                            </div>
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
@endsection

@section('about')
@endsection



