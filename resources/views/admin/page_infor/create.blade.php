@extends('admin.main')

@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="event_image">Tiêu đề - Trang chủ:</label>
                <input type="text" value="{{old('title_page')}}" class="form-control"  id="title_page" name="title_page">
            </div>
            <div class="form-group">
                <label for="event_image">Nội dung - Trang chủ:</label>
                <input type="text" value="{{old('content_page')}}" class="form-control"  id="content_page" name="content_page">
            </div>
            <div class="form-group">
                <label for="event_image">Email - Trang chủ:</label>
                <input type="text" value="{{old('email_page')}}" class="form-control"  id="email_page" name="email_page">
            </div>
            <div class="form-group">
                <label for="event_image">Số điện thoại - Trang chủ:</label>
                <input type="text" value="{{old('phone_page')}}" class="form-control"  id="phone_page" name="phone_page">
            </div>
            <div class="form-group">
                <label for="event_image">Địa chỉ - Trang chủ:</label>
                <input type="text" value="{{old('address_page')}}" class="form-control"  id="address_page" name="address_page">
            </div>
            <div class="form-group">
                <label for="event_image">Tiêu đề - Trang Về Chúng Tôi:</label>
                <input type="text" value="{{old('title_aboutus')}}" class="form-control"  id="title_aboutus" name="title_aboutus">
            </div>
            <div class="form-group">
                <label for="event_image">Nội dung - Trang Về Chúng Tôi:</label>
                <input type="text" value="{{old('content_aboutus')}}" class="form-control"  id="content_aboutus" name="content_aboutus">
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </div>
        @csrf
    </form>
@endsection
