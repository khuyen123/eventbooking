@extends('admin.main')

@section('head')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Họ tên</label>
                <input readonly type="text" value="{{$user->hoten}}" class="form-control" name="hoten" id="hoten" >
            </div>
            <div class="form-group">
                <label for="name">Ngày sinh</label>
                <input style="width:200px" type="date" value="{{$user->ngaySinh}}" class="form-control" name="ngaySinh" id="NgaySinh" >
            </div>
            <label>Địa chỉ:</label>
            <div class="form-group" style="display:flex">
                
                <label for="name" style="width:100px">Tỉnh thành:</label>
                
                <select onchange="finddistrict()" class="form-control" style="width:200px" id="user_province" name="user_province">
                    <option value="{{$user->wards->district->id_tinhthanh}}" selected >{{$user->wards->district->province->tentinhthanh}}</option>
                    @foreach($provinces as $province)
                        <option  value="{{$province->id}}" >{{$province->tentinhthanh}}</option>
                    @endforeach
                </select>
                <label for="name" style="width:100px; margin-left:10px">Quận huyện:</label>
                <select onchange="findward()" class="form-control" style="width:200px" id="user_district" name="user_district">   
                    <option value="{{$user->wards->id_quanhuyen}}">{{$user->wards->district->tenquanhuyen}}</option>
                </select>
                <label for="name" style="width:100px;margin-left:10px" >Xã phường:</label>
                <select class="form-control" style="width:200px" id="user_wards" name="id_xaphuong">   
                    <option value="{{$user->id_xaphuong}}">{{$user->wards->tenxaphuong}}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Địa chỉ chi tiết</label>
                <input  type="text" value="{{$user->diachi}}" class="form-control" name="diachi" id="diachi" placeholder="Nhập nội dung">
            </div>
            <div class="form-group">
                <label for="name">Số điện thoại</label>
                <input  type="text" value="{{$user->sdt}}" class="form-control" name="sdt" id="SDT" placeholder="Nhập nội dung">
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input readonly type="text" value="{{$user->email}}" class="form-control" name="email" id="email" placeholder="Nhập nội dung">
            </div>
            <div class="form-group" style="display:flex">
                <label for="name">Trạng Thái: &nbsp;</label>
                <?php
                    $html = '';
                    if ($user->trangthai == 1){
                        $html = '<span style="font-size:15px;padding-top:10px" class="badge badge-success ">Đang hoạt động</span>';
                        $html .='<a style="margin-left:10px" class="btn btn-danger" onClick="lockuser('.$user->id.')"><i class="fa fa-ban" ></i>&nbsp;Khoá</a>';
                        echo $html;
                    } else {
                        $html = '<span style="font-size:15px;padding-top:10px" class="badge badge-danger ">Đang bị khoá</span>';
                        $html .='<a style="margin-left:10px" class="btn btn-success" onClick="unlockuser('.$user->id.')"><i class="fa fa-unlock" ></i>&nbsp;Mở Khoá</a>';
                        echo $html;
                    }
                ?>
                
            </div>
            <div class="form-group">
                <label for="name">Quyền truy cập</label>
               <select id="user_role" onchange="changerole('{{$user->id}}')" class="form-control" style="width:300px">
                    <option value="1" >Khách hàng</option>
                    <option value="2" >Ban tổ chức</option>
                    <option selected value="{{$user->quyentruycap}}" >{{$user->roles->tenquyentruycap}}</option>
               </select>
        </div>
        <button type="submit" id="submit_edit_user" class="btn btn-primary">Thay đổi</button>
        <!-- /.card-body -->
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace( 'content' );
    </script>
    <script>
        function lockuser(id){
            var data = {
                'trangthai':0
            }
            Swal.fire(
                'Khoá người dùng?',
                'Bạn có chắc chắn muốn khoá người dùng này không?',
                'warning'
            ).then(function(){
                $.ajax({
                    type:"POST",
                    url:'lock_user/'+id,
                    data:data,
                    dataType: "JSON",
                    success: function(response){
                        Swal.fire(
                            'Thành Công!',
                            'Khoá người dùng thành công!',
                            'success'
                        ).then(function(){
                            location.reload();
                        })
                    }
                })
            })
        }
        function unlockuser(id){
            var data = {
                'trangthai':1
            }
            Swal.fire(
                'Mở Khoá người dùng?',
                'Bạn có chắc chắn muốn mở khoá người dùng này không?',
                'warning'
            ).then(function(){
                $.ajax({
                    type:"POST",
                    url:'unlock_user/'+id,
                    data:data,
                    dataType: "JSON",
                    success: function(response){
                        Swal.fire(
                            'Thành Công!',
                            'Mở Khoá người dùng thành công!',
                            'success'
                        ).then(function(){
                            location.reload();
                        })
                    }
                })
            })
        }
        function changerole(id){ 
            var data = {
                'quyentruycap':$('#user_role').val()
            }
            Swal.fire(
                'Đổi quyền truy cập',
                'Bạn có muốn đổi quyền truy cập cho người dùng này không?',
                'warning'
            ).then(function(){
                $.ajax({
                    type:"POST",
                    url:'changerole/'+id,
                    dataType: "JSON",
                    data: data,
                    success: function(response){
                        Swal.fire(
                            'Thành công',
                            'Thay đổi quyền truy cập thành công!',
                            'success'
                        ).then(function(){
                            location.reload();
                        })
                    }
                })
            })
        }
        function finddistrict(){
            var id= '';
            id = $('#user_province').val();
            $("#user_district").empty();
            $("#user_wards").empty();
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
                        var x = document.getElementById("user_district");
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
            id = $('#user_district').val();
            $("#user_wards").empty();
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
                        var x = document.getElementById("user_wards");
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
    </script>

@endsection
