<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sự kiện số | Lịch sử đặt vé</title>

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
    <style type="text/css">
  /**
   * Google webfonts. Recommended to include the .woff version for cross-client compatibility.
   */
  @media screen {
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 400;
      src: local('Source Sans Pro Regular'), local('SourceSansPro-Regular'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format('woff');
    }
    @font-face {
      font-family: 'Source Sans Pro';
      font-style: normal;
      font-weight: 700;
      src: local('Source Sans Pro Bold'), local('SourceSansPro-Bold'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format('woff');
    }
  }
  /**
   * Avoid browser level font resizing.
   * 1. Windows Mobile
   * 2. iOS / OSX
   */
  body,
  table,
  td,
  a {
    -ms-text-size-adjust: 100%; /* 1 */
    -webkit-text-size-adjust: 100%; /* 2 */
  }
  /**
   * Remove extra space added to tables and cells in Outlook.
   */
  table,
  td {
    mso-table-rspace: 0pt;
    mso-table-lspace: 0pt;
  }
  /**
   * Better fluid images in Internet Explorer.
   */
  img {
    -ms-interpolation-mode: bicubic;
  }
  /**
   * Remove blue links for iOS devices.
   */
  a[x-apple-data-detectors] {
    font-family: inherit !important;
    font-size: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
    color: inherit !important;
    text-decoration: none !important;
  }
  /**
   * Fix centering issues in Android 4.4.
   */
  div[style*="margin: 16px 0;"] {
    margin: 0 !important;
  }
  body {
    width: 100% !important;
    height: 100% !important;
    padding: 0 !important;
    margin: 0 !important;
  }
  /**
   * Collapse table borders to avoid space between cells.
   */
  table {
    border-collapse: collapse !important;
  }
  a {
    color: #1a82e2;
  }
  img {
    height: auto;
    line-height: 100%;
    text-decoration: none;
    border: 0;
    outline: none;
  }
  </style>

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
                            <img style="width:90px;height:90px" src="{{asset('client/img/logo.png')}}" alt="">
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
                            <span>Lịch sử đặt vé</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
  <!-- end preheader -->

  <!-- start body -->
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td align="center" bgcolor="#fff">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 1000px;">
          <tr>
            <td align="left" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; border-top: 3px solid #d4dadf;">
              <h1 style="margin: 0; font-size: 32px; font-weight: 700; letter-spacing: -1px; line-height: 48px;">Thông tin đặt vé: {{$new_titket->event_detail->event->tenSukien.' '.$new_titket->event_detail->wards->district->province->tentinhthanh}}</h1>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <!-- end hero -->

    <!-- start copy block -->
    <tr>
      <td align="center" bgcolor="#fff">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 1000px;">

          <!-- start copy -->
          <tr>
            <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
              <p style="margin: 0;">Xin chào {{$new_titket->ten_nguoidat}}, Cảm ơn bạn đã Đặt vé tại hệ thống Sự kiện số. Sau đây là thông tin đặt vé của bạn</p>
            </td>
          </tr>
          <!-- end copy -->

          <!-- start button -->
          <tr>
            <td align="left" bgcolor="#ffffff">
              <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td align="left" bgcolor="#ffffff" style="padding: 12px;">
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td align="left"  style="border-radius: 5px;width:200px" >
                                <h4>Mã đặt vé: </h4>
                            </td>  
                            <td align="left"  style="border-radius: 5px;">
                                <h3 style="color:red;font-weight:bold"> #{{$new_titket->id_ve}} </h4>
                            </td>
                        </tr>
                        <tr>
                            <td align="left"  style="border-radius: 5px;">
                                <h4>Số điện thoại đặt: </h4>
                            </td>  
                            <td align="left"  style="border-radius: 5px;">
                                <h4> {{$new_titket->sdt_nguoidat}} </h4>
                            </td>
                        </tr>
                        <tr>
                            <td align="left"  style="border-radius: 5px;">
                                <h4>Tên sự kiện: </h4>
                            </td>  
                            <td align="left"  style="border-radius: 5px;">
                                <h4> {{$new_titket->event_detail->event->tenSukien.' '.$new_titket->event_detail->wards->district->province->tentinhthanh}} </h4>
                            </td>
                        </tr>
                        <tr>
                            <td align="left"  style="border-radius: 5px;">
                                <h4>Địa điểm: </h4>
                            </td>  
                            <td align="left"  style="border-radius: 5px;">
                                <h4> {{$new_titket->event_detail->diachi.' '.$new_titket->event_detail->wards->tenxaphuong.' '.$new_titket->event_detail->wards->district->tenquanhuyen
                                    .' '.$new_titket->event_detail->wards->district->province->tentinhthanh}} </h4>
                            </td>
                        </tr>
                        <tr>
                            <td align="left"  style="border-radius: 5px;">
                                <h4>Thời gian diễn ra: </h4>
                            </td>  
                            <td align="left"  style="border-radius: 5px;">
                                <h4> {{$new_titket->event_detail->ketthuc}} </h4>
                            </td>
                        </tr>
                        <tr>
                            <td align="left"  style="border-radius: 5px;">
                                <h4>Hình thức vé: </h4>
                            </td>  
                            <td align="left"  style="border-radius: 5px;">
                                <h4> {{$new_titket->event_detail->titkettype->tenhinhthuc}}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td align="left"  style="border-radius: 5px;">
                                <h4>Số chỗ ngồi: </h4>
                            </td>  
                            <td align="left"  style="border-radius: 5px;">
                                <h4> {{$new_titket->soCho}}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td align="left"  style="border-radius: 5px;">
                                <h4>Số ghế: </h4>
                            </td>  
                            <td align="left"  style="border-radius: 5px;">
                                <h4> {{$new_titket->soGhe}}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td align="left"  style="border-radius: 5px;">
                                <h4>Tổng tiền: </h4>
                            </td>  
                            <td align="left"  style="border-radius: 5px;">
                                <h4> {{number_format($new_titket->tongtien,0,',','.').' VNĐ'}}</h4>
                            </td>
                        </tr>
                        <tr>
                            <td align="left"  style="border-radius: 5px;">
                                <h4>Thanh toán: </h4>
                            </td>  
                            <td align="left"  style="border-radius: 5px;">
                                <h4> {{$new_titket->thanhtoan == 0 ? 'Chưa thanh toán':'Đã Thanh toán'}}</h4>
                            </td>
                        </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <!-- end button -->

          <!-- start copy -->
          <tr>
            <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
              <p style="margin: 0;">Hãy đưa mã đặt vé cho nhân viên soát vé để Check-in hoặc in vé!</p>
            </td>
          </tr>
          <!-- end copy -->

          <!-- start copy -->
          <tr>
            <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf">
              <p style="margin: 0;">Trân Trọng,<br> Sự kiện số</p>
            </td>
          </tr>
          <!-- end copy -->

        </table>
      </td>
    </tr>
    <!-- end copy block -->

    <!-- start footer -->
    
    <!-- end footer -->
  </table>
  <!-- end body -->
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
                                <a href="\">
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
            <form method="POST" action="{{route('search')}}" class="search-model-form">
                <input type="text" id="searchString" name="searchString" placeholder="Nhập tên sự kiện cần tìm..." value=""/>
                @csrf
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