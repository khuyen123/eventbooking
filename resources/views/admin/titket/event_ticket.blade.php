@extends('admin.main')

@section('head')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')
    <form action="/admin/titket/find" method="POST">
        <h4 style="color:tomato;font-weight:bold;margin:10px 10px 10px 10px" >Chọn vé bạn muốn xem chi tiết hoặc tìm kiếm bằng Mã đặt vé</h4>
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
            <th style="width:150px" >Mã đặt vé</th>
            <th>Người đặt</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Thanh toán</th>
            <th>Check-in</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tickets as $ticket)
            <tr>
                <td style="color:tomato;font-weight:bold">
                    #{{$ticket->id_ve}}
                </td>
                <td>
                    {{$ticket->ten_nguoidat}}
                </td>
                <td>
                    {{$ticket->sdt_nguoidat}}
                </td>
                <td>
                    {{$ticket->email_nguoidat}}
                </td>
                <td>
                    @if($ticket->thanhtoan == 0) <p class="badge badge-danger" style="font-size: 13px ;"> Chưa thanh toán </p> @endif
                    @if($ticket->thanhtoan == 1) <p class="badge badge-success" style="font-size: 13px">Đã thanh toán</p> @endif
                </td>
                <td>
                    @if($ticket->kiemtra == 0) <p class="badge badge-danger" style="font-size: 13px ;"> Chưa Check-in </p> @endif
                    @if($ticket->kiemtra == 1) <p class="badge badge-success" style="font-size: 13px">Đã Check-in</p> @endif
                </td>
                <td>
                <a href="/admin/titket/detail/{{$ticket->id_ve}}" class="btn btn-success btn-sm"><i class="fa fa-info-circle"></i>&nbsp;Xem chi tiết</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('footer')
    
   
@endsection
