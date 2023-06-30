
@extends('client.main')
@section('content')
    <!-- Hero Section Begin -->
    <section class="hero-section">
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
                        <h3>Sự kiện phù hợp</h3>
                        <form action="#">
                            <div class="check-date">
                                <label for="cus_yearold">Độ tuổi của bạn:</label>
                                <input type="text" class="search-input" id="cus_yearold">
                            </div>
                            <!-- <div class="check-date">
                                <label for="date-out">Check Out:</label>
                                <input type="text" class="date-input" id="date-out">
                                <i class="icon_calendar"></i>
                            </div> -->
                            
                            <div class="check-date">
                                <label for="number_cus">Số người đi cùng bạn:</label>
                                <input type="number" class="search-input" id="number_cus">
                            </div>
                            <div class="select-option">
                                <label for="cus_cate">Hình thức sự kiện mà bạn muốn:</label>
                                <select id="cus_cate">
                                    <option value="">Lễ hội âm nhạc</option>
                                    <option value="">Đấu giá từ thiện</option>
                                    <option value="">Cắm trại dã ngoại</option>
                                    
                                </select>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            @foreach($banners as $banner)
                <div class="hs-item set-bg" data-setbg="{{$banner->noidung}}"></div>
            @endforeach
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Us Section Begin -->
    <section class="aboutus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <span>Về chúng tôi</span>
                            <h2>Sự kiện số <br />{{$pageinfor->tieude_trangchu}}</h2>
                        </div>
                        <p class="f-para">{{$pageinfor->noidung_trangchu}} </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-pic">
                        <div class="row">
                            @foreach($banners_2 as $key)
                            <div class="col-sm-6">
                                <img style="height:350px;" src="{{asset($key->noidung)}}" alt="">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section End -->

    <!-- Services Section End -->
    <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Sự kiện nổibật</span>
                        <h2>Sự kiện nổi bật đang mở đặt vé</h2>
                    </div>
                </div>
            </div>
           
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Home Room Section Begin -->
    <section class="hp-room-section">
        <div class="container-fluid">
            <div class="hp-room-items">
                <div class="row">
                    @foreach($topevents as $topevent)
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="{{asset('client/'.$topevent->noidung)}}">
                            <div class="hr-text">
                                <h3>{{$topevent->tenSukien}}</h3>
                                <h2>{{number_format($topevent->giave,0,',','.')}} VNĐ<span>/Vé</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Địa điểm:</td>
                                            <td>{{$topevent->diachi}}</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Hình thức vé:</td>
                                            <td>
                                                @if($topevent->id_hinhthucve == 1) Chỗ ngồi theo ghế @endif
                                                @if($topevent->id_hinhthucve == 2) Chỗ ngồi tự do @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Độ tuổi:</td>
                                            <td>Lớn hơn {{$topevent->dotuoichophep}}</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Tình trạng:</td>
                                            <td>
                                                @if($topevent->sovetoida>$topevent->sovedaban) Còn vé: {{$topevent->sovetoida-$topevent->sovedaban}} @endif
                                            </td>
                                        </tr>
                                    
                                    </tbody>
                                </table>
                                <a href="/client/event_detail/{{$topevent->id_chitietsukien}}" class="primary-btn">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Home Room Section End -->

   
    <!-- Blog Section Begin -->
    
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
  @endsection