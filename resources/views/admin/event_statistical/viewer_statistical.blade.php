@extends('admin.main')

@section('content')    
    <table class="table">
        <thead>
        <tr>
            <th style="width:250px">Họ tên</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Số vé đã mua</th>
            <th>Thao tác</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>
                    {{$user->hoten}}
                </td>
                <td>
                    {{$user->email}}
                </td>
                <td>
                   {{$user->sdt}}
                </td>
                <td>
                    {{$user->ticket->count()}}
                </td>
               
                <td>
                    <a href="/admin/statistical/viewer_statistical/{{$user->id}}" class="btn btn-success btn-sm"><i class="fa fa-info-circle"></i>&nbsp;Xem chi tiết</a>
                </td>
            </tr>
        
        @endforeach
        </tbody>
    </table>
   
 
@endsection
