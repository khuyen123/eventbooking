<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sự kiện số | Sự kiện</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
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
            <li><i class="fa fa-envelope"></i>{{$page_infor->email_trangchu}}</li>
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
            <li><i class="fa fa-envelope"></i>{{$page_infor->email_trangchu}}</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="tn-right">
                           
                        <?php   
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
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                    <div class="logo">
                            <a href="/">
                                <img style="width:90px;height:90px" src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                <li ><a href="/">Trang chủ</a></li>
                                    <li class="active"><a href="{{route('client_events')}}">Sự kiện</a></li>
                                    <li><a href="{{route('admin_index')}}">Ban tổ chức</a></li>
                                    <li><a href="{{route('aboutus')}}">Về chúng tôi</a>
                                    
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
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Sự kiện</h2>
                        <div class="bt-option">
                            <a href="/">Trang chủ</a>
                            <span>Sự kiện</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">
                <?php
                $html_detail = '';
                $route = "'event_detail',['detail_id' =>";
                foreach ($event_details as $key =>$event_detail) {
                    $html_detail .='<div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img style=" height:233px;border-style:groove" src="'.$event_detail->noidung.'" alt="">
                        <div class="ri-text">
                            <h4>'.$event_detail->tenSukien.'</h4>
                            <h3>'.$event_detail->giave.' VNĐ<span>/Vé</span></h3>
                            <table>
                                <tbody>
                                <tr>
                                            <td class="r-o">Địa chỉ:</td>
                                            <td style="height:80px">'.$event_detail->diachi.'</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Hình thức vé:</td>';
                                            ($event_detail->id_hinhthucve == 1) ? $html_detail .='<td>Vé ghế ngồi</td>': $html_detail .='<td>Vé tự do</td>';
                                            $html_detail .=
                                        '</tr>
                                        <tr>
                                            <td class="r-o">Độ tuổi:</td>
                                            <td>Lớn hơn '.$event_detail->dotuoichophep.'</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Tình trạng:</td>
                                            <td>';$event_detail->sovedaban >= $event_detail->sovetoida ? $html_detail .='Hết vé': $html_detail.='Còn vé';
                                            $html_detail .='</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Hoạt động:</td>
                                            <td>';
                                            $event_detail->trangthai == 1?$html_detail.='<p class="badge badge-success" style="font-size:15px">Đang hoạt động</p>' : $html_detail.='<p class="badge badge-danger" style="font-size:15px">Kết thúc</p>';
                                            $html_detail .='</td>
                                        </tr>
                                </tbody>
                            </table>';
                           
                            $html_detail .=
                            '<a href="/client/event_detail/'.$event_detail->id_chitietsukien.'" class="primary-btn">Xem chi tiết</a>
                        </div>
                    </div>
                </div>';
                }
                echo $html_detail;
                ?>
                   
                  
            </div>
           
        </div>
    </section>
    <!-- Rooms Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ft-about">
                            <div class="logo">
                                <a href="#">
                                    <img style="width:90px;height:90px" src="img/logo.png" alt="">
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
            <form method="POST" action="{{route('search')}}" class="search-model-form">
                <input type="text" id="searchString" name="searchString" placeholder="Nhập tên sự kiện cần tìm..." value=""/>
                @csrf
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function() {
            findprovince(6271);
        });
        function findprovince(id){
            var data;
            $.ajax({
                type: "GET",
                url: '/finddistrict/'+id,
                dataType: "JSON",
                success: function(response){
                   console.log(response.province.tentinhthanh);
                }
            })
        }
    </script>
</body>

</html>