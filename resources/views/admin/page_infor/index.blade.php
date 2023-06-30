@extends('admin.main')

@section('content')
<div class="container-fluid">
        <a class="btn btn-success" href="create">Thêm mới</a>
       
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>Tiêu đề Trang Chủ</th>
            <th>Tiêu đề - Về Chúng tôi</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
            @foreach($infors as $infor)
                <tr>
                    <td>
                        {{$infor->tieude_trangchu}}
                    </td>
                    <td>
                        {{$infor->tieude_vechungtoi}}
                    </td>
                    <td>
                        {{$infor->email_trangchu}}
                    </td>
                    <td>
                        {{$infor->sdt_trangchu}}
                    </td>
                    <td>
                        @if($infor->trangthai == 1) <p class="badge badge-success" style="font-size: 15px">Đang Mở</p> @endif
                        @if($infor->trangthai == 0) <p class="badge badge-danger" style="font-size: 15px">Đang Đóng</p> @endif
                    </td>
                    <td>
 
                        @if($infor->trangthai == 0) <a onclick="unlock_infor('{{$infor->id}}')" class="btn btn-success btn-sm" style="font-size: 13px"><i class="fa fa-unlock"></i></a> @endif
                        <a href="/admin/page_infor/edit/{{$infor->id}}" class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i></a>
                        <a onclick="delete_infor('{{$infor->id}}')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function delete_infor(id){
            Swal.fire({
            title: 'Xoá Thông tin',
            text: "Bạn có muốn Xoá thông tin trang này không?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xác nhận!'
        }).then((result)=>{
            if (result.isConfirmed) {
                $.ajax({
                    type:"DELETE",
                    url:'/admin/page_infor/delete/'+id,
                    success: function(){
                        Swal.fire(
                            'Thành công!',
                            'Xoá Thông tin thành công!',
                            'success'
                        ).then(function(){
                            location.reload()
                        })
                    }
                })
            }
        })
        }
        function unlock_infor(id){
            Swal.fire({
            title: 'Mở khoá',
            text: "Bạn có muốn Mở khoá thông tin trang này không?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xác nhận!'
        }).then((result)=>{
            if (result.isConfirmed) {
                $.ajax({
                    type:"POST",
                    url:'/admin/page_infor/unlock/'+id,
                    success: function(){
                        Swal.fire(
                            'Thành Công!',
                            'Mở Khoá thông tin thành công',
                            'success'
                        ).then(function(){
                            location.reload()
                        })
                    }
                })
            }
        })
        }
    </script>

@endsection
