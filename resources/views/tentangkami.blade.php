@extends('welcome')

@section('tentangkami')
<section id="about" class="about section" style="margin: 0; padding-top: 20px;">
    <div class="container">
        <h1><b>Tentang Kami</b></h1>

        @if($post)
            <div class="row gy-4 mt-4">
                <div class="col-12 col-md-6">
                    <h3>{!! $post->judul !!}</h3>
                    <p>{!! $post->isi !!}</p>
                </div>
            </div>
        @endif

        @if(isset($post->map_link))
            <div class="row gy-4 mt-4">
                <div class="col-12">
                    <iframe src="{{ $post->map_link }}" width="100%" height="400" style="border:0;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        @endif
        <div class="row gy-4 mt-4">
            <div class="col-12">
                @foreach($postsWithKategori6 as $postItem)
                    <div class="post-item mt-3">
                        <h4>{!! $postItem->judul !!}</h4>
                        <p>{!! $postItem->isi !!}</p>
                        @if($postItem->social_link)
                            <a href="{{ $postItem->social_link }}" target="_blank">
                                <i class="fab fa-instagram"></i> 
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection

@section('about')

@endsection