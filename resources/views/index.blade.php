@extends('layoutWeb.navbar-index')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="clearfix">
        <div class="container d-flex h-100">
            <div class="row justify-content-center align-self-center" data-aos="fade-up">
                <div class=" col-lg-8 intro-info order-lg-first order-last" data-aos="zoom-in" data-aos-delay="100">
                    <h2 class="text-light text-center">Sistem Informasi Kerjasama <span>Inovindo</span> dengan
                        Dunia Pendidikan</h2>
                    <div>
                        {{-- <a href="#about" class="btn-get-started scrollto">Get Started</a> --}}
                    </div>
                </div>

                <div class=" col-lg-6 intro-img order-lg-last order-first" data-aos="zoom-out" data-aos-delay="200">

                </div>
            </div>

        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">

            <div class="container" data-aos="fade-up">
                <div class="row">

                    <div class="col-lg-5 col-md-6 my-auto">
                        <div class="about-img" data-aos="fade-right" data-aos-delay="100">
                            <img src="{{ asset('storage/' . $landingpage->gambar) }}" alt="">
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-6">
                        <div class="about-content" data-aos="fade-left" data-aos-delay="100">
                            <h2 class="">Profil Perusahaan</h2>
                            <p>{!!$landingpage->deskripsi_profil !!}</p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- End About Section -->

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3>Tentang Sistem Kerjasama Inovindo</h3>
                </header>
                <div class="container">
                    <div class="row">
                        
                        <div class="embed-responsive embed-responsive-21by9 col-sm-12 col-md-7 col-lg-6 my-lg-auto mt-md-4">
                                    <iframe width="500" height="300" src="{{$landingpage->video}}"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                      
                        <div class="col-lg-6">
                            <div class="why-us-content text-justify mt-lg-5">
                                <p>{!! $landingpage->deskripsi_tentang_kami !!}</p>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

            <div class="container">
                <div class="row counters" data-aos="fade-up" data-aos-delay="100">

                    <div class="col-lg-4 col-4 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $countInstitusi }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Institusi</p>
                    </div>

                    <div class="col-lg-4 col-4 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $countKerjasama }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Kerjasama</p>
                    </div>

                    <div class="col-lg-4 col-4 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $countPeserta }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Peserta Magang</p>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Why Us Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3>Layanan Kerjasama Kami</h3>
                    <p>Adapun poin kerjasama yang dijalin Inovindo dengan dunia pendidikan meliputi dibawah ini</p>
                </header>
                <div class="row g-5">
                    @foreach ($jenis as $row)
                        <div class="col-md-6 col-lg-4 wow bounceInUp" data-aos="zoom-in" data-aos-delay="100">
                            <div class="box">
                                <img src="{{ asset('storage/' . $row->gambar) }}" alt=""  class="w-75 mb-3">
                                <h4 class="title"><a href="">{{ $row->jenis }}</a></h4><br>
                                <p class="description">{!! $row->isi !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Services Section -->



        <!-- ======= Call To Action Section ======= -->
        <section id="call-to-action" class="call-to-action">
            <div class="container" data-aos="zoom-out">
                <div class="row">
                    <div class="col-lg-9 text-center text-lg-start">
                        <!-- <h3 class="cta-title">Call To Action</h3> -->
                        <p class="cta-text">Mari ciptakan pengajar yang produktif,siswa yang berkualitas juga kompeten pada bidangnya dengan kurikulum yang memang dibutuhkan perusahaan dan industri saat ini.</p>
                    </div>
                    <div class="col-lg-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle" href="/register">Jalin Kerjasama Sekarang Juga!</a>
                    </div>
                </div>

            </div>
        </section><!--  End Call To Action Section -->
        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio section-bg">
            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3 class="section-title">Galeri</h3>
                </header>
                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($gallery as $data)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="{{ asset('storage/' . $data->gambar) }}" class="img-fluid" alt={{ $data->gambar }}
                                    width=416px>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container" data-aos="zoom-in">

                <header class="section-header">
                    <h3>Testimoni</h3>
                </header>

                <div class="row justify-content-center">
                    <div class="col-lg-8">

                    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                            <div class="swiper-wrapper">

                                @foreach( $testimoni as $row)
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        
                                        <img src="{{ asset('/storage/'.$row->institusi['logo']) }}" class="testimonial-img"
                                            alt="">
                                        <h3>{{ $row->institusi['nama_institusi']}}</h3>
                                        
                                        <p>
                                            {!! $row->isi !!}
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->


        
        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients">
            <div class="container" data-aos="zoom-in">

                <header class="section-header">
                    <h3>Klien Kami</h3>
                </header>

                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        @foreach ($institusi as $row)
                            <div class="swiper-slide"><img src="{{ asset('storage/' . $row->logo) }}"
                                    alt="{{ $row->logo }}" class="img-fluid" alt=""></div>
                                    @endforeach
                                </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Clients Section -->

        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing section-bg wow fadeInUp">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h3>Berita</h3>
                </header>
                <div class="row flex-items-xs-middle flex-items-xs-center">
                    @foreach ($berita as $item)
                        <div class="col-xs-12 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="card">
                                <div class="card-header">
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->gambar }}"
                                        title="" class="img-fluid">
                                </div>
                                <div class="card-block">
                                    <h4 class="card-title fw-bold fs-5 pt-5">
                                        {{ $item->judul }}
                                    </h4>
                                    <div class="isi mx-3 text-secondary">{!! strip_tags(Str::limit($item->isi,200)) !!}</div>
                                    <a href="/detail-berita/{{ $item->id }}" class="btn my-4">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>

        </section><!-- End Pricing Section -->

        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h3>Frequently Asked Questions</h3>
                    <p>Pertanyaan yang sering diajukan terkait kerjasama di Inovindo</p>
                </header>

                @foreach($pertanyaan as $item)
                <ul class="faq-list" data-aso="fade-up" data-aos-delay="100">
                    <li>
                        <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">{{$item->pertanyaan}} <span class="bi bi-chevron-down icon-show"></span><span
                                class="bi bi-chevron-up icon-close"></span></div>
                        <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                            <p>
                            {{$item->jawaban}}
                            </p>
                        </div>
                    </li>
                    
                    @endforeach
                </ul>

            </div>
        </section><!-- End F.A.Q Section -->

    </main><!-- End #main -->
@endsection