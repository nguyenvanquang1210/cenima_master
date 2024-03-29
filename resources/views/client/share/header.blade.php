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
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                            <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
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
                                <div class="navbar-wrap main-menu d-none d-lg-flex">
                                    <ul class="navigation">
                                        <li class="menu-item-has-children"><a href="/">Home</a>
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
<!-- header-area-end -->


