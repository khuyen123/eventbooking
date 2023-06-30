@extends('admin.main')

@section('content')
    <form action="/admin/statistical/event_statistical/date" method="POST">
        <div class="card-body" style="display: flex ;">
            <div class="form-group">
                <label for="name" style="font-size:20px ; color:burlywood">Từ</label>
                <input  value="<?php if(isset($from)) echo $from; ?>"  style="width:200px;" class="form-control" type="datetime-local" id="statistical_from" name="statistical_from">
            </div>
            <div class="form-group">
                <label for="name" style="margin-left:10px;font-size:20px ; color:burlywood">Đến</label>
                <input  value="<?php if(isset($to)) echo $to; ?>"  style="width:200px;margin-left:10px" class="form-control" type="datetime-local" id="statistical_to" name="statistical_to">
            </div>
            <div class="form-group">
                <label for="name" style="margin-left:10px;font-size:20px ; color:burlywood">Tình trạng</label>
                <select class="form-control" style="width:200px; margin-left:10px" name="tinhtrang">
                    <option value="2">Tất cả</option>
                    <option value="1">Đang hoạt động</option>
                    <option value="0">Đã kết thúc</option>
                </select>
            </div>
            <button class="btn btn-success btn-sm" style="height:40px ;width:100px;margin-top:36px;margin-left:10px" >Xem</button>
        </div>
        <!-- /.card-body -->

        @csrf
    </form>
    
    <table class="table">
        <thead>
        <tr>
          
            <th style="width:250px">Tên sự kiện</th>
            <th>Tỉnh thành</th>
            <th>Trạng thái</th>
            <th>Số vé bán được</th>
            <th>Tổng tiền bán vé</th>
            <th>Thao tác</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
                <td>
                    {{$event->event->tenSukien}}
                </td>
                <td>
                    {{$event->wards->district->province->tentinhthanh}}
                </td>
                <td>
                    @if($event->trangthai == 0) <p class="badge badge-danger" style="font-size: 13px ;"> Đã kết thúc </p> @endif
                    @if($event->trangthai == 1) <p class="badge badge-success" style="font-size: 13px">Đang hoạt động</p> @endif
                </td>
                <td>
                    {{$event->sovedaban}}
                </td>
                <td>
                    {{number_format($event->sovedaban*$event->giave,0,',','.')}} VNĐ
                </td>
                <td>
                    <a href="/admin/statistical/event_statistical/{{$event->id}}" class="btn btn-success btn-sm"><i class="fa fa-info-circle"></i>&nbsp;Xem chi tiết</a>
                </td>
            </tr>
        
        @endforeach
        </tbody>
    </table>
   
 
@endsection
