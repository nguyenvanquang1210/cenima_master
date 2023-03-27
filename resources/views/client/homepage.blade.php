<!doctype html>
<html class="no-js" lang="">

<head>
    @include('client.share.css')
</head>
<body>
    <!-- preloader -->
    <div id="preloader">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <img src="/assets_client/img/preloader.svg" alt="">
            </div>
        </div>
    </div>
    <!-- preloader-end -->
    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    <header class="header-style-two">
        @php
            $check = Auth::guard('customer')->check();
            $user  = Auth::guard('customer')->user();
        @endphp
        <div class="header-top-wrap">
            <div class="container custom-container">
                <div class="row align-items-center">
                    <div class="col-md-6 d-none d-md-block">
                        <div class="header-top-subs">
                            <p>Rạp Chiếu Phim <span>WuangWang</span></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="header-top-link">
                            <ul class="quick-link">
                                @if ($check)
                                    <li><a href="#">Chào Bạn, {{ $user->ho_va_ten }}</a></li>
                                @else
                                    <li><a href="#">About Us</a></li>
                                @endif
                            </ul>
                            <ul class="header-social">
                                <li><a href="https://www.facebook.com/profile.php?id=100035109856548">
                                    <i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://twitter.com/WagZan1210">
                                    <i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/wag.ng_/">
                                    <i class="fab fa-instagram"></i>
                                <li><a href="https://www.tiktok.com/@cuteo1210">
                                    <i class="fab fa-tiktok"></i>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sticky-header" class="menu-area">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                        <div class="menu-wrap">
                            <nav class="menu-nav show">
                                <div class="logo">
                                    <a href="/">
                                        <img src="/assets_client/img/logo/logo.png" alt="Logo">
                                    </a>
                                </div>

                                <div class="navbar-wrap main-menu d-none d-lg-flex">
                                    <ul class="navigation">
                                        <li class="active menu-item-has-children"><a href="/">Home</a>
                                        </li>
                                        <li class="menu-item-has-children"><a href="/phim-dang-chieu">Phim Đang Chiếu</a>
                                        </li>
                                        <li class="menu-item-has-children"><a href="/phim-sap-chieu">Phim Sắp Chiếu</a>
                                        </li>
                                        <li class="menu-item-has-children"><a href="/bai-viet">Blog</a>
                                        </li>
                                        <li><a href="contact.html">contacts</a></li>
                                    </ul>
                                </div>
                                <div class="header-action d-none d-md-block">
                                    <ul>
                                        <li class="d-none d-xl-block">
                                            <div class="footer-search">
                                                <form action="/tim-kiem" method="POST">
                                                    @csrf
                                                    <input type="text" name="search" placeholder="Nhập Tên Phim">
                                                    <button type="submit"><i class="fas fa-search"></i></button>
                                                </form>
                                            </div>
                                        </li>

                                        @if ($check)
                                            <div class="navbar-wrap main-menu d-none d-lg-flex">
                                                <ul class="navigation">
                                                    <li class="active menu-item-has-children ml-4"><a href="#"><i class="fa-solid fa-user fa-2x"></i></a>
                                                        <ul class="submenu">
                                                            <li><a href="index.html">Trang Cá Nhân</a></li>
                                                            <li><a href="/logout">Đăng Xuất</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        @else
                                            <li class="header-btn"><a href="/register" class="btn">Sign In</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <!-- slider-area -->
        {{-- <section class="slider-area slider-bg" data-background="{{ isset($config->bg_homepage) ? $config->bg_homepage : '/assets_client/img/banner/s_slider_bg.jpg'}}"> --}}
        <section class="slider-area slider-bg" style="background-image: url('{{ isset($config->bg_homepage) ? $config->bg_homepage : '/assets_client/img/banner/s_slider_bg.jpg'}}')">
            <div class="slider-active">
                @if(isset($phim_1))
                <div class="slider-item">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 order-0 order-lg-2">
                                <div class="slider-img text-center text-lg-right" data-animation="fadeInRight"
                                    data-delay="1s">
                                    <img src="{{ $phim_1->avatar }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="banner-content">
                                    <h6 class="sub-title" data-animation="fadeInUp" data-delay=".2s">WuangWang</h6>
                                    <h2 class="title" data-animation="fadeInUp" data-delay=".4s">{{ $phim_1->ten_phim }}</h2>
                                    <div class="banner-meta" data-animation="fadeInUp" data-delay=".6s">
                                        <ul>
                                            <li class="quality">
                                                <span>{{ $phim_1->the_loai }}</span>
                                                <span>hd</span>
                                            </li>
                                            <li class="category">
                                                {{ $phim_1->dien_vien }}
                                            </li>
                                            <li class="release-time">
                                                <span><i class="far fa-calendar-alt"></i> {{ $phim_1->ngay_khoi_chieu }}</span>
                                                <span><i class="far fa-clock"></i> {{ $phim_1->thoi_luong }} min</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="{{ $phim_1->trailer }}"
                                        class="banner-btn btn popup-video" data-animation="fadeInUp"
                                        data-delay=".8s"><i class="fas fa-play"></i> Watch Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if(isset($phim_2))
                <div class="slider-item">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 order-0 order-lg-2">
                                <div class="slider-img text-center text-lg-right" data-animation="fadeInRight"
                                    data-delay="1s">
                                    <img src="{{ $phim_2->avatar }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="banner-content">
                                    <h6 class="sub-title" data-animation="fadeInUp" data-delay=".2s">WuangWang</h6>
                                    <h2 class="title" data-animation="fadeInUp" data-delay=".4s">{{ $phim_2->ten_phim }}</h2>
                                    <div class="banner-meta" data-animation="fadeInUp" data-delay=".6s">
                                        <ul>
                                            <li class="quality">
                                                <span>{{ $phim_2->the_loai }}</span>
                                                <span>hd</span>
                                            </li>
                                            <li class="category">
                                                {{ $phim_2->dien_vien }}
                                            </li>
                                            <li class="release-time">
                                                <span><i class="far fa-calendar-alt"></i> {{ $phim_2->ngay_khoi_chieu }}</span>
                                                <span><i class="far fa-clock"></i> {{ $phim_2->thoi_luong }} min</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="{{ $phim_2->trailer }}"
                                        class="banner-btn btn popup-video" data-animation="fadeInUp"
                                        data-delay=".8s"><i class="fas fa-play"></i> Watch Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if(isset($phim_3))
                <div class="slider-item">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 order-0 order-lg-2">
                                <div class="slider-img text-center text-lg-right" data-animation="fadeInRight"
                                    data-delay="1s">
                                    <img src="{{ $phim_3->avatar }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="banner-content">
                                    <h6 class="sub-title" data-animation="fadeInUp" data-delay=".2s">WuangWang</h6>
                                    <h2 class="title" data-animation="fadeInUp" data-delay=".4s">{{ $phim_3->ten_phim }}</h2>
                                    <div class="banner-meta" data-animation="fadeInUp" data-delay=".6s">
                                        <ul>
                                            <li class="quality">
                                                <span>{{ $phim_3->the_loai }}</span>
                                                <span>hd</span>
                                            </li>
                                            <li class="category">
                                                {{ $phim_3->dien_vien }}
                                            </li>
                                            <li class="release-time">
                                                <span><i class="far fa-calendar-alt"></i> {{ $phim_3->ngay_khoi_chieu }}</span>
                                                <span><i class="far fa-clock"></i> {{ $phim_3->thoi_luong }} min</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="{{ $phim_3->trailer }}"
                                        class="banner-btn btn popup-video" data-animation="fadeInUp"
                                        data-delay=".8s"><i class="fas fa-play"></i> Watch Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </section>
        <!-- Phim Nổi bật -->
        <section class="ucm-area ucm-bg2" data-background="/assets_client/img/bg/ucm_bg02.jpg">
            <div class="container">
                <div class="row align-items-end mb-55">
                    <div class="col-lg-6">
                        <div class="section-title title-style-three text-center text-lg-left">
                            <span class="sub-title">WuangWang</span>
                            <h2 class="title">Phim Nổi Bật</h2>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ucm-nav-wrap">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="dangChieu-tab" data-toggle="tab" href="#dangChieu"
                                        role="tab" aria-controls="tvShow" aria-selected="true">Phim Đang Chiếu</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="sapChieu-tab" data-toggle="tab" href="#sapChieu"
                                        role="tab" aria-controls="movies" aria-selected="false">Phim Sắp Chiếu</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="dangChieu" role="tabpanel"
                        aria-labelledby="dangChieu-tab">
                        <div class="ucm-active-two owl-carousel">
                            @foreach ($list_phim as $key => $value )
                                @if ($value->tinh_trang == 1)
                                <div class="movie-item movie-item-two mb-30">
                                    <div class="movie-poster">
                                        <a href="/chi-tiet-phim/{{$value->slug_ten_phim}}-{{$value->id}}"><img src="{{ $value->avatar }}"
                                                alt=""></a>
                                    </div>
                                    <div class="movie-content">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h5 class="title"><a href="/chi-tiet-phim/{{$value->slug_ten_phim}}-{{$value->id}}">{{ $value->ten_phim }}</a></h5>
                                        <span class="rel">{{ $value->dao_dien }}</span>
                                        <div class="movie-content-bottom">
                                            <ul>
                                                <li class="tag">
                                                    <a href="#">HD</a>
                                                    <span class="like mt-1">{{ $value->thoi_luong }} min</span>
                                                </li>
                                                <li>
                                                    <span class="like"><i class="fas fa-thumbs-up"></i> 3.5</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sapChieu" role="tabpanel" aria-labelledby="sapChieu-tab">
                        <div class="ucm-active-two owl-carousel">
                            @foreach ($list_phim as $key => $value )
                                @if ($value->tinh_trang == 2)
                                <div class="movie-item movie-item-two mb-30">
                                    <div class="movie-poster">
                                        <a href="/chi-tiet-phim/{{$value->slug_ten_phim}}-{{$value->id}}"><img src="{{ $value->avatar }}"
                                                alt=""></a>
                                    </div>
                                    <div class="movie-content" >
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h5 class="title"><a href="/chi-tiet-phim/{{$value->slug_ten_phim}}-{{$value->id}}">{{ $value->ten_phim }}</a></h5>
                                        <span class="rel">{{ $value->dao_dien }}</span>
                                        <div class="movie-content-bottom">
                                            <ul>
                                                <li class="tag">
                                                    <a href="#">HD</a>
                                                    <span class="like">{{ $value->thoi_luong }} min</span>
                                                </li>
                                                <li>
                                                    <span class="like"><i class="fas fa-thumbs-up"></i> 3.5</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('client.share.js')
    @yield('js')
</body>

</html>
