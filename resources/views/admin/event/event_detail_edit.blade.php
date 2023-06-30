@extends('admin.main')

@section('head')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">
        <div class="form-group">
                <label for="name">Số điện thoại liên hệ </label>
                <input  class="form-control" type="text" id="contact_phone_detail" value="{{$event_detail->sdt_lienhe}}" name="contact_phone_detail">
            </div>
            <div class="form-group">
                <label for="name">Email liên hệ </label>
                <input type="hidden" name="detail_id" id="detail_id"  value="{{$event_detail->id}}">
                <input class="form-control" type="text" value="{{$event_detail->email_lienhe}}" id="contact_email_detail" name="contact_email_detail">
            </div>
            <div class="form-group">
                <label for="name">Tên người liên hệ </label>
                <input  class="form-control" type="text" value="{{$event_detail->ten_lienhe}}" id="contact_name_detail" name="contact_name_detail">
            </div>
            <div class="form-group">
                <label for="name">Thời gian bắt đầu</label>
                <input onchange="checkDate()" @if($event_detail->sovedaban >0) readonly @endif style="width:300px"  class="form-control" type="datetime-local" value="{{$event_detail->batdau}}" id="start_time_detail" name="start_time_detail">
                <p class="text-danger" id="alert_start" ></p>
            </div>
            <div class="form-group">
                <label for="name">Thời gian kết thúc</label>
                <input onchange="checkDate()" @if($event_detail->sovedaban >0) readonly @endif style="width:300px"  class="form-control" type="datetime-local" value="{{$event_detail->ketthuc}}" id="end_time_detail" name="end_time_detail">
                <p class="text-danger" id="alert_end" ></p>
            </div>
            <div class="form-group" style="display:flex">
                <label for="name" style="width:100px">Địa điểm:</label>
                <label for="name" style="width:100px">Tỉnh thành:</label>
                
                <select @if($event_detail->sovedaban >0) disabled @endif onchange="finddistrict()" class="form-control" style="width:200px" id="detail_province" name="detail_province">
                    <option value="{{$event_detail->wards->district->id_tinhthanh}}" selected >{{$event_detail->wards->district->province->tentinhthanh}}</option>
                    @foreach($provinces as $province)
                        <option  value="{{$province->id}}" >{{$province->tentinhthanh}}</option>
                    @endforeach
                </select>
                <label for="name" style="width:100px; margin-left:10px">Quận huyện:</label>
                <select @if($event_detail->sovedaban >0) disabled @endif onchange="findward()" class="form-control" style="width:200px" id="detail_district" name="detail_district">   
                    <option value="{{$event_detail->wards->id_quanhuyen}}">{{$event_detail->wards->district->tenquanhuyen}}</option>
                </select>
                <label for="name" style="width:100px;margin-left:10px" >Xã phường:</label>
                <select @if($event_detail->sovedaban >0) disabled @endif class="form-control" style="width:200px" id="detail_wards" name="detail_wards">   
                    <option value="{{$event_detail->id_xaphuong}}">{{$event_detail->wards->tenxaphuong}}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Địa chỉ chi tiết</label>
                <input @if($event_detail->sovedaban >0) readonly @endif value="{{$event_detail->diachi}}" class="form-control" type="text" id="detail_address" name="detail_address">
            </div>
            <div class="form-group">
                <label for="name">Khu vực</label>
                <input @if($event_detail->sovedaban >0) readonly @endif value="{{$event_detail->khuvuc}}" class="form-control" type="text" id="detail_locate" name="detail_locate">
            </div>
       
            <div class="form-group">
                <label for="name">Số vé tối đa</label>
                <input @if($event_detail->sovedaban >0) readonly @endif value="{{$event_detail->sovetoida}}" class="form-control" type="number" id="detail_maxtitket" name="detail_maxtitket">
            </div>
            <div class="form-group">
                <label for="name">Hình thức chỗ ngồi</label>
                <select @if($event_detail->sovedaban >0) disabled @endif class="form-control" onchange="seat_control()" name="hinhthucve" id="hinhthucve">
                    <option value="{{$event_detail->id_hinhthucve}}" selected>{{$event_detail->titkettype->tenhinhthuc}}</option>
                    <option value = "1">Chỗ ngồi theo ghế</option>
                    <option value = "2">Chỗ ngồi tự do</option>
                </select>
                <input @if($event_detail->id_hinhthucve == 2) readonly @endif @if($event_detail->sovedaban >0) readonly @endif placeholder="Nhập số hàng ghế" value="{{$event_detail->sohangghe}}" class="form-control" type="number" style="margin-top:10px; width:200px" id="totalrow_creat" name="totalrow_creat">
                <p class="text-danger" id="alert_seat" ></p>
                <input @if($event_detail->id_hinhthucve == 2) readonly @endif @if($event_detail->sovedaban >0) readonly @endif placeholder="Nhập số ghế mỗi hàng" value="{{$event_detail->soghemoihang}}" class="form-control" type="number" style="margin-top:10px;width:200px" id="totalseat_row_create" name="totalseat_row_create">
                <p class="text-danger" id="alert_seat_2" ></p>
            </div>
            <div class="form-group">
                <label>Hoạt động: </label>
                <?php 
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $today = date("y-m-d  G:i:s");
                    $check_availble =  strtotime($event_detail->ketthuc)-strtotime($today); 
                    if ($check_availble<= 0){
                        echo '<span style="font-size:15px" class="badge badge-danger">Sự kiện đã kết thúc</span>';
                        if ($event_detail->trangthai!=0){
                            echo '<span id="close_event_button" style="font-size:15px; margin-left:10px" class="btn btn-success" >Đóng sự kiện</span>';
                        }
                        
                    } else echo '<span style="font-size:15px" class="badge badge-success">Đang hoạt động</span>';
                ?>
            </div>
            <div class="form-group">
                <label for="name">Giá vé </label>
                <input @if($event_detail->sovedaban >0) readonly @endif  value="{{$event_detail->giave}}" class="form-control" type="text" id="detail_prince" name="detail_prince">
            </div>
            
            <div class="form-group">
                <label for="name">Độ tuổi cho phép </label>
                <input @if($event_detail->sovedaban >0) readonly @endif value="{{$event_detail->dotuoichophep}}" class="form-control" type="number" id="detail_yearold" name="detail_yearold">
            </div>
            <div class="form-group">
                <label for="detail_description">Mô tả: </label>
                <input  type="text" id="content" name="detail_description" class="form-control" value="{{$event_detail->mota}}">
            </div>
            

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" id="submit_edit_detail" class="btn btn-primary">Cập nhật</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    
    <script>
       
                //check total seat:
        var total_seat
        var row_seat
        var total_row
        $(document).on('keyup',"#totalrow_creat",function(){
            total_seat = parseInt($("#detail_maxtitket").val())
            total_row = parseInt($("#totalrow_creat").val())
            row_seat = parseInt($("#totalseat_row_create").val())
            var seat = total_row*row_seat
            if (seat < total_seat) {
                document.getElementById("alert_seat").innerText = "Số ghế nhập vào đang nhỏ hơn số vé tối đa";
                document.getElementById("alert_seat_2").innerText = "Số ghế nhập vào đang nhỏ hơn số vé tối đa";
                document.getElementById("submit_edit_detail").disabled = true;
            } else {
                if (seat <= total_seat+10){
                    document.getElementById("alert_seat").innerText = "";
                    document.getElementById("alert_seat_2").innerText = "";
                    document.getElementById("submit_edit_detail").disabled = false;
                } else {
                    if(seat>total_seat+10){
                        document.getElementById("alert_seat").innerText = "Số ghế nhập vào đang lớn hơn số vé tối đa (Số ghế dự bị tối đa là 10)";
                        document.getElementById("alert_seat_2").innerText = "Số ghế nhập vào đang lớn hơn số vé tối đa (Số ghế dự bị tối đa là 10)";
                        document.getElementById("submit_edit_detail").disabled= true;
                    }
                }
            }
        
        })
        $(document).on('keyup',"#totalseat_row_create",function(){
            total_seat = parseInt($("#detail_maxtitket").val())
            total_row = parseInt($("#totalrow_creat").val())
            row_seat = parseInt($("#totalseat_row_create").val())
            var seat = total_row*row_seat
            if (seat < total_seat) {
                document.getElementById("alert_seat").innerText = "Số ghế nhập vào nhỏ hơn số vé tối đa";
                document.getElementById("alert_seat_2").innerText = "Số ghế nhập vào nhỏ hơn số vé tối đa";
                document.getElementById("submit_edit_detail").disabled = true;
            } else {
                if (seat <= total_seat+5){
                    document.getElementById("alert_seat").innerText = "";
                    document.getElementById("alert_seat_2").innerText = "";
                    document.getElementById("submit_edit_detail").disabled = false;
                } else {
                    if(seat>total_seat+5){
                        document.getElementById("alert_seat").innerText = "Số ghế nhập vào đang lớn hơn số vé tối đa (Số ghế dự bị tối đa là 5)";
                        document.getElementById("alert_seat_2").innerText = "Số ghế nhập vào đang lớn hơn số vé tối đa (Số ghế dự bị tối đa là 5)";
                        document.getElementById("submit_edit_detail").disabled = true;
                    }
                }
            }
        })
        function seat_control(){
            var seat_type = $("#hinhthucve").val()
            if (seat_type == 2) {
                document.getElementById("totalrow_creat").readOnly = true;
                document.getElementById("totalseat_row_create").readOnly = true;
                document.getElementById("submit_edit_detail").disabled = false;
                document.getElementById("totalrow_creat").value = "";
                document.getElementById("totalseat_row_create").value = "";
            } else {
                document.getElementById("totalrow_creat").readOnly = false;
                document.getElementById("totalseat_row_create").readOnly = false;
                document.getElementById("totalrow_creat").value = "";
                document.getElementById("submit_edit_detail").disabled = true;
                document.getElementById("totalseat_row_create").value = "";
                
            } 
        }
        var detail_id = $('#detail_id').val()
        $(document).on('click','#close_event_button',function(){
            var data = {'trangthai' : parseInt(0)}
            Swal.fire({
                title: 'Đóng sự kiện',
                text: 'Bạn có muốn đóng sự kiện này không?',
                icon:'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xác nhận!'
        }).then((result)=>{
            if (result.isConfirmed){
                    $.ajax({
                        type: "POST",
                        dataType: "JSON",
                        data: data,
                        url: "closeevent/" +detail_id,
                        success: function(response){
                            Swal.fire(
                                'Thành công!',
                                'Đóng sự kiện thành công',
                                'success'
                            ).then(function(){
                                location.reload()
                            })
                        }
                    })
                }
            })
        })
        function finddistrict(){
            var id= '';
            id = $('#detail_province').val();
            $("#detail_district").empty();
            district(id);
        }
        function district(province_id){
            var data = [];
            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: '/getdistrict/'+province_id,
                success: function(response){
                    data = response.districts;
                    
                    data.forEach(key =>{
                        var x = document.getElementById("detail_district");
                        var option = document.createElement("option");
                        option.text = key.tenquanhuyen;
                        option.value = key.id;
                        x.add(option);
            });
                
                },
                error: function(){
                    console.log(23);
                }
            })
            
        }
        function findward(){
            var id= '';
            id = $('#detail_district').val();
            $("#detail_wards").empty();
            wards(id);
        }
        function wards(district_id){
            var data = [];
            $.ajax({
                type: "GET",
                dataType: "JSON",
                url: '/getwards/'+district_id,
                success: function(response){
                    data = response.wards;
                    data.forEach(key =>{
                        var x = document.getElementById("detail_wards");
                        var option = document.createElement("option");
                        option.text = key.tenxaphuong;
                        option.value = key.id;
                        x.add(option);
            });
                
                },
                error: function(){
                    console.log(23);
                }
            })
        }
        function checkDate(){
            var todate = new Date()
            if (Date.parse($('#end_time_detail').val())<Date.parse($('#start_time_detail').val())) {
                document.getElementById("submit_edit_detail").disabled = true;
                document.getElementById('alert_start').innerText="Bạn đang chọn sai ngày tháng"
                document.getElementById('alert_end').innerText="Bạn đang chọn sai ngày tháng"
            } else {
                if (Date.parse($('#start_time_detail').val())<=Date.parse(todate)) {
                document.getElementById("submit_edit_detail").disabled = true;
                document.getElementById('alert_start').innerText="Bạn đang chọn sai ngày tháng"
                document.getElementById('alert_end').innerText="Bạn đang chọn sai ngày tháng"
                } else {
                    if (Date.parse($('#end_time_detail').val())<=Date.parse(todate)) {
                    document.getElementById("submit_edit_detail").disabled = true;
                    document.getElementById('alert_start').innerText="Bạn đang chọn sai ngày tháng"
                    document.getElementById('alert_end').innerText="Bạn đang chọn sai ngày tháng"
                } else {
                    document.getElementById("submit_edit_detail").disabled = false;
                    document.getElementById('alert_start').innerText=""
                    document.getElementById('alert_end').innerText=""
                }
                } 
            }  
        }
    </script>
@endsection
