@extends('admin.main')

@section('content')    
    <table class="table">
        <thead>
        <tr>
          
            <th style="width:250px">Tên sự kiện</th>
            <th>Địa điểm</th>
            <th>Tình trạng vé</th>
            <th>Số chỗ</th>
            <th>Số ghế</th>
            <th>Tổng tiền</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tickets as $ticket)
            <tr>
                <td style="font-weight:bold ;">
                    {{$ticket->event_detail->event->tenSukien}}
                </td>
                <td>
                    {{$ticket->event_detail->wards->district->province->tentinhthanh}}
                </td>
                <td>
                    @if ($ticket->kiemtra == 0) <p class="badge badge-danger" >Chưa Check-in</p> @endif
                    @if ($ticket->kiemtra == 1) <p class="badge badge-success" >Đã Check-in</p> @endif
                </td>
                <td>
                    {{$ticket->soCho}}
                </td>
                <td>
                    @if($ticket->event_detail->id_hinhthucve == 2) Tự do @endif
                    {{$ticket->soGhe}}
                </td>
                <td>
                    {{number_format($ticket->tongtien,0,',','.')}} VNĐ
                </td>
            </tr>
        
        @endforeach
        </tbody>
    </table>
   
 
@endsection
