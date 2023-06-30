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
        <div class="search-icon  search-switch">
            <i class="icon_search"></i>
        </div>
        <div class="header-configure-area">
          
                            <a href="{{Route('login')}}" class="bk-btn">Đăng nhập</a>
                            <a href="{{Route('sigup')}}" class="bkj-btn">Đăng ký</a>
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
            <li class="active"><a href="{{route('home')}}">Trang chủ</a></li>
                                    <li><a href="{{route('client_events')}}">Sự kiện</a></li>
                                    <li><a href="{{route('admin_index')}}">Ban tổ chức</a></li>
                                    <li><a href="{{route('aboutus')}}">Về chúng tôi</a>
                
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
       
        <ul class="top-widget">
            <li><i class="fa fa-phone"></i>{{$pageinfor->sdt_trangchu}}</li>
            <li><i class="fa fa-email"></i> {{$pageinfor->email_trangchu}}</li>
        </ul>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="tn-left">
                        <li><i class="fa fa-phone"></i> {{$pageinfor->sdt_trangchu}}</li>
            <li><i class="fa fa-envelope"></i>{{$pageinfor->email_trangchu}}</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="tn-right">
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
                                <img style="width:90px;height:90px" src="client/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li class="active"><a href="{{route('home')}}">Trang chủ</a></li>
                                    <li><a href="{{route('client_events')}}">Sự kiện</a></li>
                                    <li><a href="{{route('admin_index')}}">Ban tổ chức</a></li>
                                    <li><a href="{{route('aboutus')}}">Về chúng tôi</a>
                                        
                                    </li>
                                    
                                </ul>
                            </nav>
                            <div class="nav-right search-switch">
                                <i class="icon_search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@yield('menu')