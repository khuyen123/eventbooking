@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">STT</th>
            <th>Họ Tên</th>
            <th>Ngày sinh</th>
            <th>Trạng Thái</th>
            <th>Giới tính</th>
            <th>Thao tác</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        {!! \App\Helpers\Helper::user($users) !!}
        </tbody>
    </table>
    {!! $users->links('pagination::bootstrap-4') !!}
    <script>
        function deleteuser(id){
            Swal.fire(
                'Xoá người dùng!',
                'Bạn có muốn xoá người dùng này không?',
                'warning'
            ).then(function(){
                $.ajax({
                    type:"DELETE",
                    url:'delete/'+id,
                    dataType: "JSON",
                    success: function(response){
                        Swal.fire(
                            'Thành công!',
                            'Xoá người dùng thành công!',
                            'success'
                        ).then(function(){
                            location.reload();
                        })
                    }
                })
            })
        }
    </script>
@endsection
