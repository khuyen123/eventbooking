<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sự kiện số | Thông tin tài khoản</title>
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('client/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('client/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('client/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('client/css/flaticon.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('client/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('client/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('client/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('client/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('client/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('client/css/style.css')}}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
        <div class="search-icon search-switch">
            <i class="icon_search"></i>
        </div>
        <div class="header-configure-area">
           
        <?php

            use Illuminate\Support\Facades\Auth;

            $html = '<a href="/client/login" class="bk-btn">Đăng nhập</a>';
            $html .='<a href="/client/register" class="bkj-btn">Đăng ký</a>';
            $html_logined = '';
            if (isset(Auth::user()->id)){
                $html_logined = '<a href="/client/infor/'.Auth::user()->id.'/index" class="bk-btn">';
            }
            if(isset(Auth::user()->hoten)) {
                $html_logined .= Auth::user()->hoten;
            }
            $html_logined .= '</a>';
            $html_logined .='<a href="/client/logout" class="bkj-btn">Đăng xuất</a>';
            if (Auth::check()) {
                echo $html_logined;
            } else {
                echo $html;
            }
            ?>
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li><a href="/">Trang chủ</a></li>
                    <li class="active"><a href="{{route('client_events')}}">Sự kiện</a></li>
                    <li><a href="{{route('admin_index')}}">Ban tổ chức</a></li>
                    <li><a href="{{route('aboutus')}}">Về chúng tôi</a>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="top-social">
            
        </div>
        <ul class="top-widget">
        <li><i class="fa fa-phone"></i>{{$page_infor->sdt_trangchu}}</li>
            <li><i class="fa fa-email"></i>{{$page_infor->email_trangchu}}</li>
        </ul>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section header-normal">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="tn-left">
                        <li><i class="fa fa-phone"></i>{{$page_infor->sdt_trangchu}}</li>
            <li><i class="fa fa-email"></i>{{$page_infor->email_trangchu}}</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="tn-right">
                           
                        <?php   
                            $html = '<a href="/client/login" class="bk-btn">Đăng nhập</a>';
                            $html .='<a href="/client/register" class="bkj-btn">Đăng ký</a>';
                            if (isset(Auth::user()->id)){
                                $html_logined = '<a href="/client/infor/'.Auth::user()->id.'/index" class="bk-btn">';
                            }
                            if(isset(Auth::user()->hoten)) {
                                $html_logined .= Auth::user()->hoten;
                            }
                            $html_logined .= '</a>';
                            $html_logined .='<a href="/client/logout" class="bkj-btn">Đăng xuất</a>';
                            if (Auth::check()) {
                                echo $html_logined;
                            } else {
                                echo $html;
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                    <div class="logo">
                            <a href="/">
                                <img style="width:90px;height:90px" src="{{asset('client/img/logo.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                              <h3 style="color:darkgoldenrod">Xin Chào!</h3>
                              <h3 style="color:darkgoldenrod"><?php echo Auth::user()->hoten; ?></h3>
                              <input type="hidden" value="{{Auth::user()->id}}" id="user_id" />
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section" style="height:700px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1>Sự kiện số</h1>
                        <p>Đây là trang web giúp bạn có thể mua vé tham gia sự kiện một cách nhanh chóng và thuận tiện.</p>
                        
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                    <div class="booking-form">
                        <h3>Thay đổi mật khẩu</h3>
                        <form action="" method="post">
                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    {{Session::get('error')}}
                                </div>
                            @endif
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{Session::get('success')}}
                                </div>
                            @endif
                            <div class="check-date">
                                <label for="newpass_token" style="font-size:20px ;">Mã xác nhận:</label>
                                <input style="border-radius: 10px; font-size:15px; text-transform:uppercase;" type="text"  id="newpass_token" name="newpass_token"/>
                                <p style="color:#CB4154">{{ $errors->first('newpass_token') }}</p>
                            </div>
                            <div class="check-date">
                                <label for="newpass" style="font-size:20px ;">Mật khẩu mới:</label>
                                <input style="border-radius: 10px; font-size:15px" type="password"  id="newpass" name="newpass"/>
                                <p style="color:#CB4154">{{ $errors->first('newpass') }}</p>
                            </div>
                            <div class="check-date">
                                <label for="newpass_repeat" style="font-size:20px ;">Nhập lại mật khẩu mới:</label>
                                <input style="border-radius: 10px; font-size:15px" type="password"  id="newpass_repeat" name="newpass_repeat"/>
                                <p style="color:#CB4154">{{ $errors->first('newpass_repeat') }}</p>
                            </div>
                             
                            <button type="submit">Tiếp tục</button>
                            @csrf
                           
                        </form>
                         
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            @foreach($banners as $banner)
                <div class="hs-item set-bg" data-setbg="{{asset($banner->noidung)}}"></div>
            @endforeach
        </div>
    </section>
    <!-- Hero Section End -->

   
    <!-- Home Room Section End -->

   
    <!-- Blog Section Begin -->
    
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ft-about">
                            <div class="logo">
                                <a href="#">
                                <img style="width:90px;height:90px" src="{{asset('client/img/logo.png')}}" alt="">
                                </a>
                            </div>
                            <p>Chúng tôi tạo ra trang web để bạn được chill<br /> Đồ án tốt nghiệp</p>
                            <div class="fa-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-contact">
                            <h6>Liên hệ chúng tôi</h6>
                            <ul>
                            <li><i class="fa fa-phone"></i>{{$page_infor->sdt_trangchu}}</li>
                                <li><i class="fa fa-envelope"></i>{{$page_infor->email_trangchu}}</li>
                                <li><i class="fa fa-location-arrow"></i>{{$page_infor->diachi_trangchu}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-newslatter">
                            <h6>Gửi phản hồi của bạn</h6>
                            <form action="#" class="fn-form">
                               
                                <input type="text" placeholder="Phản hổi của bạn">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </footer>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="{{asset('client/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('client/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('client/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('client/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('client/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('client/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('client/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('client/js/main.js')}}"></script>
</body>

</html>