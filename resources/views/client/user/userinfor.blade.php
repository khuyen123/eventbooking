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

    <!-- Rooms Section Begin -->
   
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section">
     <div class="container-fluid mt--7" style="background-color:#e9ecef ;">
      <div class="row" style="background-color:#f6f9fc ;">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0" style="background-color:#d2e3ee  ;">
          <div class="card card-profile shadow" >
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img alt="Ảnh đại diện" src="{{asset(Auth::user()->anhdaidien)}}" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div  class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                    <form enctype="multipart/form-data" method="POST" action="/client/infor/{{Auth::user()->id}}/changeavt">
                    @if (Session::has('changepass_success'))
                                
                                <input type ="hidden" value="{{Session::get('changepass_success')}}" id="changepass_success">
                            
                        @endif
                    <input type="file" class="form-control" onchange="choosefile(this)" accept="image/*" id="user_avt" name="user_avt">
                    <p style="color:#CB4154">{{ $errors->first('user_avt') }}</p>
                        <img height="100px" width="100px" src="" name="user_avt" id="image" style="margin-top:10px">
                        
                        <script>
                            function choosefile(fileInput){
                                if (fileInput.files && fileInput.files[0]){
                                    var reader = new FileReader();
                                    reader.onload = function(e){
                                        $('#image').attr('src',e.target.result);
                                    }
                                    reader.readAsDataURL(fileInput.files[0]);
                                }
                            }
                        </script>
                        <button style="margin-left:40px; margin-top:10px" class="btn btn-success" ><i class="fa fa-user"></i>Thay đổi ảnh</button>
                        @csrf
                    </form>
                    
              </div>
              <div class="d-flex justify-content-between">
                    <button id="ticket_history" style="margin-left:145px; margin-top:50px" class="btn btn-warning" type="button" ><i class="fa fa-ticket"></i>Xem lịch sử đặt vé</button>
              </div>
            </div>
            
          </div>
        </div>
        <div class="col-xl-8 order-xl-1" >
          <div class="card bg-secondary shadow" style="border:none;">
            <div class="card-header bg-white border-0" >
              <div class="row align-items-center" >
                <div class="col-8">
                  <h3 class="mb-0">Tài khoản của tôi</h3>
                </div>
                <div class="col-4 text-right">
                  <button class="btn btn-primary" id="edit_profile" style="background-color:#DFA974;border:none">Chỉnh sửa</button>
                </div>
              </div>
            </div>
            <div class="card-body" style="background-color:#E1D9C1;">
              <form>
                <h6 class="heading-small text-muted mb-4">Thông tin tài khoản</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Tên đăng nhập</label>
                        <input readonly type="text" id="input-username" class="form-control form-control-alternative" placeholder="Tên đăng nhập" value="{{Auth::user()->username}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email đăng nhập</label>
                        <input readonly value="{{Auth::user()->email}}" type="email" id="input-email" class="form-control form-control-alternative" placeholder="Email đăng nhập">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">Loại tài khoản:</label>
                        <input readonly value="{{(Auth::user()->quyentruycap == 1) ? 'Khách hàng':(Auth::user()->quyentruycap == 2?'Ban tổ chức':'Quản trị viên')}}" type="text" id="input-first-name" class="form-control form-control-alternative">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">Mật khẩu:</label>
                        <div style="display:flex">
                            <input style="width:250px" readonly value="*******" type="password" id="input-first-name" class="form-control form-control-alternative">
                            <button style="margin-left:40px" type="button" class="btn btn-primary" id="change_pass" ><i class="fa fa-key"></i>Thay đổi</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Thông tin liên hệ</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Số điện thoại</label>
                        <input style="width:285px" id="input-number" class="form-control form-control-alternative" placeholder="Số điện thoại" value="{{Auth::user()->sdt}}" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Địa chỉ</label>
                        <input id="input-address" class="form-control form-control-alternative" placeholder="Địa chỉ (Số nhà/Đường, Thôn, Xóm...)" value="{{Auth::user()->diachi}}" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Tỉnh thành</label>
                        <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Tỉnh Thành" value="{{Auth::user()->wards->district->province->tentinhthanh}}">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Quận huyện</label>
                        <input type="text" id="input-district" class="form-control form-control-alternative" placeholder="Quận huyện" value="{{Auth::user()->wards->district->tenquanhuyen}}">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Xã phường</label>
                        <input type="text" id="input-wards" class="form-control form-control-alternative" placeholder="Quận huyện" value="{{Auth::user()->wards->tenxaphuong}}">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Trạng thái hoạt động</h6>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Hoạt động</label>
                        <input readonly type="text" id="input-status" class="form-control form-control-alternative" placeholder="Hoạt động" value="{{Auth::user()->trangthai== 1? 'Đang hoạt động':'Đang bị khoá'}}">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Kích hoạt</label>
                        <input readonly type="text" id="input-status" class="form-control form-control-alternative" placeholder="Kích hoạt" value="{{Auth::user()->kichhoat== 1? 'Đã kích hoạt':'Chưa kích hoạt'}}">
                      </div>
                    </div>
              </form>
            </div>
          </div>
        </div>
      </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click','#ticket_history',function(){
          var user_id = parseInt($('#user_id').val())
          location.href = "/client/titket/titket_list/"+user_id
        })
        function finddistrict(){
            var id= '';
            id = $('#detail_province').val();
            $("#detail_district").empty();
            district(id);
        }
        $(document).on('click','#change_pass',function(){
          location.href = 'changepass'
        })
        $(document).ready(function(){
          if ($('#changepass_success').val()== 1){
            Swal.fire(
              'Thành công!',
              'Thay đổi mật khẩu thành công',
              'success'
            )
          }
        });
    </script>
</body>

</html>