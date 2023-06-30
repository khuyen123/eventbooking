@extends('admin.main')

@section('content')
<div class="container-fluid">
        <a class="btn btn-success" href="create">Thêm mới</a>
       
    </div>
    <table class="table">
        <thead>
        <tr>
           
            <th>Tên sự kiện</th>
            <th>Ảnh</th>
            <th>Ngày thêm</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        
        @foreach($images as $image)
        <tr>
           
            <td>{{$image->event_detail->event->tenSukien.'-' .$image->event_detail->wards->district->province->tentinhthanh}}</td>
            <td><a  target="_blank"><img src="{{asset('client/'.$image->noidung)}}" width="100px" ></a></td>
            <td>{{$image->created_at}}</td>
            <td>
                <a class="btn btn-danger btn-sm" href="#" onclick="removeImage({{$image->id}})">
                    <i class="fas fa-trash"></i >
                </a>
            </td>
        </tr>
      
        @endforeach
        </thead>
        <tbody>

        </tbody>
    </table>
 
    <script>
        function removeImage(id){
            Swal.fire({
                title: 'Bạn có muốn xóa không?',
                text: "Xóa xong không thể khôi phục!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xác nhận!'
            }).then((result)=>{
                if(result.isConfirmed) {
                    $.ajax({
                        dataType:"JSON",
                        url:'delete/'+id,
                        type:"DELETE",
                        success:function(result){
                            Swal.fire(
                            'ĐÃ xóa!',
                            'Đã xóa thành công hình ảnh.',
                            'success'
                        ).then(function(){
                            location.href='index';
                        })
                        },
                        error: function(){
                            Swal.fire(
                                'Thất bại!',
                                'Xoá hình ảnh thất bại!',
                                'error'
                            )
                        }
                    })
                }
            })
        }
    </script>
@endsection
