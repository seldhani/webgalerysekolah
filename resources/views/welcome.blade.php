<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SMK Negeri 4 Bogor</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link rel="icon" type="image/png" href="../assets/images/smk4.png">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
    .hover-box {
      transition: all 0.3s ease;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .hover-box:hover {
      transform: translateY(-10px);
      box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }

    .card {
      transition: all 0.3s ease;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }

    .icon-box {
      transition: all 0.3s ease;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .icon-box:hover {
      transform: translateY(-10px);
      box-shadow: 0 5px 20px rgba(0,0,0,0.15);
      background: #f8f9fa;
    }

    .modal-content {
      transition: all 0.3s ease;
    }

    .modal-content:hover {
      transform: scale(1.02);
    }
  </style>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="/" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="../assets/images/smk4.png" alt="smkicon">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
        <li><a href="{{ route('welcome') }}">Beranda</a></li>
          <li><a href="{{ route('agenda') }}">Agenda</a></li>
          <li><a href="{{ route('informasi') }}">Informasi terkini</a></li>
          <li><a href="{{ route('welcome') }}#guru">Guru</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{ route('tentangkami') }}" style="background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 50px;">Tentang Kami</a>



    </div>
  </header>

  <class="main">


    <!-- Hero Section -->
    @yield('hero')
     
     
   
    <section id="hero" class="hero section dark-background" style="margin-bottom: 0; padding-bottom: 0;">
    <img src="assets/images/siswa.jpg" alt="" data-aos="fade-in">
    <div class="container" style="padding: 0; margin: 0;">
        <h2 data-aos="fade-up" data-aos-delay="100" style="margin: 0;">SMK Negeri<br>4 Bogor</h2>
        <p data-aos="fade-up" data-aos-delay="200" style="margin: 0;">SMK Bisa SMK Hebat</p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300"></div>
    </div>
</section><!-- /Hero Section -->

<section id="informasi" class="informasi section" style="padding: 30px 0; margin: 0;">
        @yield('informasi')
    </section>

    <section id="agenda" class="agenda section" style="margin: 0; padding-top: 20px;">
    @yield('agenda')
</section>

<section id="tentangkami" class="tentangkami section" style="margin: 0; padding-top: 20px;">
    @yield('tentangkami')
</section>



     <!-- About Section -->
@section('about')
<section id="about" class="about section" style="margin-top: -100px; padding-top: 0px;">
    <div class="container">
        <h1><b>Galery Sekolah</b></h1>
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


    </section><!-- /About Section -->



    <!-- Why Us Section -->
    
<!-- /Why Us Section -->


    <!-- Trainers Index Section -->
    <section id="guru" class="guru section" style="margin: 0; padding-top: 20px; scroll-margin-top: 100px;">
    <div class="container">
        <h1><b>Guru Sekolah</b></h1>
        
        @if($guru->isEmpty() || $guru->first()->foto->isEmpty())
            <div class="alert alert-warning">Tidak ada foto guru yang tersedia.</div>
        @else
            <div class="row gy-4">
                @foreach ($guru as $galeryItem)
                    @foreach ($galeryItem->foto as $foto)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="hover-box p-3">
                                <img src="{{ asset('images/' . $foto->file) }}" 
                                     class="img-fluid rounded mb-3" 
                                     alt="{{ $foto->judul }}"
                                     data-bs-toggle="modal" 
                                     data-bs-target="#modal-guru-{{ $foto->id }}"
                                     style="cursor: pointer; width: 100%; height: 300px; object-fit: cover;">
                                <div class="text-center">
                                    <h4>{{ $foto->judul }}</h4>
                                    @if($foto->posts)
                                        <span>{{ $foto->posts->isi ?? '' }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Modal untuk setiap foto guru -->
                        <div class="modal fade" id="modal-guru-{{ $foto->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ $foto->judul }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ asset('images/' . $foto->file) }}" 
                                             alt="{{ $foto->judul }}" 
                                             class="img-fluid mb-3">
                                        @if($foto->posts)
                                            <div class="content">
                                                {!! $foto->posts->isi ?? 'Tidak ada informasi tambahan' !!}
                                            </div>
                                        @endif
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

@show

    </main>

    <footer id="footer" class="footer position-relative light-background">

     

      <div class="container copyright text-center mt-4">
        <p> <span>Selma Ramadhani</span> <span>XII PPLG 3</span></p>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you've purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        </div>
      </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center" style="background-color: #007bff; color: white; padding: 10px 30px; text-decoration: none; border-radius: 80px; font-size: 16px;"><i
        class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
    function scrollToGuru(e) {
      e.preventDefault();
      const guruSection = document.getElementById('guru');
      guruSection.scrollIntoView({ behavior: 'smooth' });
    }
    </script>

</body>

</html>