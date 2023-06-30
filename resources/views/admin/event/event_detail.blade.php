@extends('admin.main')

@section('content')
    <div class="container-fluid">
        <a class="btn btn-success" href="create">Thêm mới</a>
       
    </div>
    <table class="table">
        <thead>
        <tr>
       
            <th>Tên sự kiện</th>
            <th>Tên người liên hệ</th>
            <th>Danh mục sự kiện</th>
            <th>Địa điểm</th>
            <th>Khu Vực</th>
            <th>Giá vé</th>
            <th>Trạng Thái</th>
            <th style="width: 150px">Thao tác</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        {!! \App\Helpers\Helper::event_detail($event_details) !!}
        </tbody>
    </table>
    <script>
        function deleteEventdetail(id){
            Swal.fire({
        title: 'Bạn có muốn xóa chi tiết sự kiện này không?',
        text: "Xóa xong không thể khôi phục!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xác nhận!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                datatype:"JSON",
                url: "delete/"+ id,
                success: function(result){
                    if (result.error == false) {
                        Swal.fire(
                            'Thành công',
                            'Xoá thành công',
                            'success'
                        ).then(function(){
                            location.href='index';
                        })
                    }
                },
                error: function() {
                    Swal.fire(
                        'Thất bại',
                        'Xoá danh mục thất bại',
                        'error'
                    )
                }
            })
        }
    })
        }
    </script>
@endsection
