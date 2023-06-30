<footer class="footer-section">
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ft-about">
                            <div class="logo">
                                <a href="#">
                                    <img style="width:90px;height:90px" src="client/img/logo.png" alt="">
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
                                <li><i class="fa fa-phone"></i>&nbsp;{{$pageinfor->sdt_trangchu}}</li>
                                <li><i class="fa fa-envelope"></i>&nbsp;{{$pageinfor->email_trangchu}}</li>
                                <li><i class="fa fa-location-arrow"></i>&nbsp;{{$pageinfor->diachi_trangchu}}</li>
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
    <script src="client/js/jquery-3.3.1.min.js"></script>
    <script src="client/js/bootstrap.min.js"></script>
    <script src="client/js/jquery.magnific-popup.min.js"></script>
    <script src="client/js/jquery.nice-select.min.js"></script>
    <script src="client/js/jquery-ui.min.js"></script>
    <script src="client/js/jquery.slicknav.js"></script>
    <script src="client/js/owl.carousel.min.js"></script>
    <script src="client/js/main.js"></script>
@yield('footer')