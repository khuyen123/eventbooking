@extends('admin.main')

@section('content')
<div class="container-fluid">
        <div class="alert alert-success" >Chọn sự kiện bạn muốn thực hiện quản lý ảnh</div>
    </div>
    <table class="table">
        <thead>
        <tr>
           
            <th>Tên sự kiện</th>
            <th>Địa điểm</th>
            <th>Bắt đầu</th>
            <th>Kết thúc</th>
            <th>Chọn</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        

        </thead>
        <tbody>
            @foreach($event_details as $event_detail)
            <tr>
            <td>{{$event_detail->event->tenSukien}}</td>
            <td>{{$event_detail->wards->district->province->tentinhthanh}}</td>
            <td>{{$event_detail->batdau}}</td>
            <td>{{$event_detail->ketthuc}}</td>
            <td>
                <a class="btn btn-danger btn-sm" href="/admin/event_image/{{$event_detail->id}}/index">
                    <i class="fa fa-info-circle"></i> Xem
                </a>
            </td>
            </tr>
            
            @endforeach
        </tbody>
    </table>

    
@endsection
