@extends('admin.main')

@section('content')
    
    <table class="table">
        <thead>
        <tr>
            <th style="width:250px">Tên khán giả</th>
            <th>Email</th>
            <th>Mã vé</th>
            <th>Số chỗ</th>
            <th>Số Ghế</th>
            <th>Tổng tiền</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>
                        {{$ticket->user->hoten}}
                    </td>
                    <td>
                        {{$ticket->user->email}}
                    </td>
                    <td>
                        {{$ticket->id_ve}}
                    </td>
                    <td>
                        {{$ticket->soCho}}
                    </td>
                    <td>
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
