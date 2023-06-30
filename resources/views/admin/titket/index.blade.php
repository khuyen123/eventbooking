@extends('admin.main')

@section('head')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')
    <form action="/admin/titket/find" method="POST">
        <h4 style="color:tomato;font-weight:bold;margin:10px 10px 10px 10px" >Chọn sự kiện bạn muốn xem danh sách vé hoặc tìm kiếm bằng Mã đặt vé</h4>
        <div class="card-body">
            <div class="form-group" style="display:flex ;">
                <label for="name" style="font-size:25px ; color:tomato">Nhập vào mã số đặt vé: </label>
                <input style="width:200px;text-transform: uppercase;margin-left:10px" class="form-control" type="text" id="titket_id" name="titket_id">
                <button style="margin-left:10px; margin-bottom:10px;" type="submit" id="submit_edit_detail" class="btn btn-primary">Tìm kiếm</button>
            </div>
            
        </div>
        @csrf
    </form>
    <table class="table">
        <thead>
        <tr>
            <th>Tên sự kiện</th>
            <th>Địa điểm</th>
            <th>Bắt đầu</th>
            <th>Kết thúc</th>
            <th>Tình trạng</th>
            <th>Số vé đã bán</th>
            <th>Thao tác</th>
            
        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
                <td style="font-weight: bold ;">
                    {{$event->event->tenSukien}}
                </td>
                <td>
                    {{$event->wards->district->province->tentinhthanh}}
                </td>
                <td>
                    {{$event->batdau}}
                </td>
                <td>
                    {{$event->ketthuc}}
                </td>
                <td>
                    @if($event->trangthai == 0) <p class="badge badge-danger" style="font-size: 13px ;"> Đã kết thúc </p> @endif
                    @if($event->trangthai == 1) <p class="badge badge-success" style="font-size: 13px">Đang hoạt động</p> @endif
                </td>
                <td>
                    {{$event->sovedaban}}
                </td>
                <td>
                <a href="/admin/titket/event_ticket/{{$event->id}}" class="btn btn-success btn-sm"><i class="fa fa-info-circle"></i>&nbsp;Xem chi tiết</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('footer')
    
   
@endsection
