<!DOCTYPE html>
<html>
  <head>
    <style>
body, p, h1 {
  margin: 0;
  padding: 0;
  font-family: "Dejavu Sans";
}
.container {
  background: #e0e2e8;
  position: relative;
  width: 100%;
  height: 100vh;
}
.container .ticket {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.container .basic {
  display: none;
}
.airline {
  display: block;
  height: 575px;
  width: 270px;
  box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.3);
  border-radius: 25px;
  z-index: 3;
}
.airline .top {
  height: 220px;
  background: #ffcc05;
  border-top-right-radius: 25px;
  border-top-left-radius: 25px;
}
.airline .top h1 {
  text-transform: uppercase;
  font-size: 12px;
  letter-spacing: 2;
  text-align: center;
  position: absolute;
  top: 30px;
  left: 50%;
  transform: translateX(-50%);
}
.airline .bottom {
  height: 355px;
  background: #fff;
  border-bottom-right-radius: 25px;
  border-bottom-left-radius: 25px;
}
.top .big {
  position: absolute;
  top: 100px;
  font-size: 65px;
  font-weight: 700;
  line-height: 0.8;
}
.top .big .from {
  color: #ffcc05;
  text-shadow: -1px 0 #000, 0 1px #000, 1px 0 #000, 0 -1px #000;
}
.top .big .to {
  position: absolute;
  left: 32px;
  font-size: 35px;
  display: flex;
  flex-direction: row;
  align-items: center;
}
.top .big .to i {
  margin-top: 5px;
  margin-right: 10px;
  font-size: 15px;
}
.top--side {
  position: absolute;
  right: 35px;
  top: 110px;
  text-align: right;
}
.top--side i {
  font-size: 25px;
  margin-bottom: 18px;
}
.top--side p {
  font-size: 10px;
  font-weight: 700;
}
.top--side p + p {
  margin-bottom: 8px;
}
.bottom p {
  display: flex;
  flex-direction: column;
  font-size: 13px;
  font-weight: 700;
}
.bottom p span {
  font-weight: 400;
  font-size: 11px;
  color: #6c6c6c;
}
.bottom .column {
  margin: 0 auto;
  width: 80%;
  padding: 2rem 0;
}
.bottom .row {
  display: flex;
  justify-content: space-between;
}
.bottom .row--right {
  text-align: right;
}
.bottom .row--center {
  text-align: center;
}
.bottom .row-2 {
  margin: 30px 0 60px 0;
  position: relative;
}
.bottom .row-2::after {
  content: "";
  position: absolute;
  width: 100%;
  bottom: -30px;
  left: 0;
  background: #000;
  height: 1px;
}
.bottom .bar--code {
  height: 50px;
  width: 80%;
  margin: 0 auto;
  position: relative;
}
.bottom .bar--code::after {
  content: "";
  position: absolute;
  width: 6px;
  height: 100%;
  background: #000;
  top: 0;
  left: 0;
  box-shadow: 10px 0 #000, 30px 0 #000, 40px 0 #000, 67px 0 #000, 90px 0 #000, 100px 0 #000, 180px 0 #000, 165px 0 #000, 200px 0 #000, 210px 0 #000, 135px 0 #000, 120px 0 #000;
}
.bottom .bar--code::before {
  content: "";
  position: absolute;
  width: 3px;
  height: 100%;
  background: #000;
  top: 0;
  left: 11px;
  box-shadow: 12px 0 #000, -4px 0 #000, 45px 0 #000, 65px 0 #000, 72px 0 #000, 78px 0 #000, 97px 0 #000, 150px 0 #000, 165px 0 #000, 180px 0 #000, 135px 0 #000, 120px 0 #000;
}
.info {
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  bottom: 10px;
  font-size: 14px;
  text-align: center;
  z-index: 1;
}
.info a {
  text-decoration: none;
  color: #000;
  background: #ffcc05;
}

    </style>
  </head>
<body>
<!-- CSS Ticket inspired by -->
<!-- https://dribbble.com/shots/2677752-Dribbble-invite-competition -->

<div class="container" >
	<div class="ticket basic">
		<p>Admit One</p>
	</div>

	<div class="ticket airline" style="border-style: groove;">
		<div class="top">
			<h1>Vé sự kiện</h1>
			<div class="big">
				<p class="from" style="margin-left:30px; color:#000;font-size:23px; text-align:center">{{$new_ticket->event_detail->event->tenSukien}}</p>
				<p class="to" style="margin-left:30px; font-size: 23px ; text-align:center">{{$new_ticket->event_detail->wards->district->province->tentinhthanh}}</p>
			</div>
		</div>
		<div class="bottom">
			<div class="column">
				<div class="row row-1">
          <table>
            <tr>
              <td width:100px>
                <p>Số chỗ</p>
              </td>  
              <td width:100px>
                <p style="margin-left:50px">Số Ghế</p>
              </td>
              <td width:100px>
                <p style="margin-left:55px">Độ tuổi</p>
              </td>
            </tr>
            <tr>
              <td>
                <p style="font-weight:bold;font-size: 15px ; color:tomato">{{$new_ticket->soCho}}</p>
              </td>
              <td>
                <p style="margin-left:50px;font-weight:bold;font-size: 15px ; color:tomato">{{$new_ticket->soGhe}}</p>
              </td>
              <td>
                <p style="margin-left:55px; font-weight:bold;font-size: 12px ; color:tomato">Trên {{$new_ticket->event_detail->dotuoichophep}}</p>
              </td>
            </tr>
          </table>
				</div>
				<div class="row row-2">
        <table>
            <tr>
              <td width:150px>
                <p><span>Thời gian</span></p>
              </td>  
              <td width:150px>
                <p style="font-size:10px; margin-left:10px"><span>Khu vực</span></p>
              </td>
            </tr>
            <tr>
              <td>
                <p style="font-size: 10px ;">{{$new_ticket->event_detail->ketthuc}}</p>
              </td>
              <td>
                <p style="margin-left:10px;font-weight:bold;font-size: 10px ;">{{$new_ticket->event_detail->khuvuc}}</p>
              </td>
            </tr>
            <tr>
              <td colspan="2">
              <p style="text-align:center; font-size:22px; color:tomato">#{{$new_ticket->id_ve}}</p>
              </td>
            </tr>
          </table>
				</div>
				<div class="row row-3">
          <p  style="font-size: 10px ; text-align:center; font-weight:bold;">Địa chỉ</p>
					<p style="font-size: 11px ; text-align:center; font-weight:bold; color:brown" >{{$new_ticket->event_detail->diachi}},&nbsp; {{$new_ticket->event_detail->wards->tenxaphuong}},&nbsp; {{$new_ticket->event_detail->wards->district->province->tentinhthanh}}</p>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>