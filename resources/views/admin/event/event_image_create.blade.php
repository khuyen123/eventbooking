@extends('admin.main')

@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="event_image">Ảnh sự kiện</label>
                <input onchange="choosefile(this)" type="file" class="form-control" accept="image/*" id="event_image" name="event_image">
                <img height="200px" width="200px" src="" id="image">
            </div>
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
            <div class="form-group">
                <label for="event_image">Mô tả:</label>
                <input type="text" class="form-control"  id="event_image_dess" name="event_image_dess">
                <input type="hidden" name="file" id=file>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm ảnh</button>
        </div>
        @csrf
    </form>
@endsection
