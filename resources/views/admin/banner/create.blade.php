@extends('admin.main')

@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="event_image">Ảnh Banner</label>
                <input type="file" class="form-control" onchange="choosefile(this)" accept="image/*" id="banner_noidung" name="banner_noidung">
                <img height="200px" width="200px" src="" id="image">
                <script>
                    function choosefile(fileInput){
                        if (fileInput.files && fileInput.files[0]){
                            var reader = new FileReader();
                            reader.onload = function(e){
                                $('#image').attr('src',e.target.result);
                            }
                            reader.readAsDataURL(fileInput.files[0]);
                        }
                    }
                </script>
            </div>
            <div class="form-group">
                <label for="event_image">Mô tả:</label>
                <input type="text" class="form-control"  id="banner_des" name="banner_des">
                <input type="hidden" name="file" id=file>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </div>
        @csrf
    </form>
@endsection
