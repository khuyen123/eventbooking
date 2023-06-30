@extends('admin.main')

@section('content')
    <div class="container-fluid">
        <button style="width:150px" type="button" class="btn btn-success" data-toggle="modal" data-target="#create_event_js">
            Thêm Sự kiện
        </button>
        <button style="width:150px" type="button" class="btn btn-warning" data-toggle="modal" id="unselectall_event">
            Bỏ chọn
        </button>
        <button style="width:150px" type="button" class="btn btn-danger" data-toggle="modal" id="delete_all_event">
            Xóa hết
        </button>
    </div>
<!-- Form Create Event_ Ajax -->
        <div class="modal fade" id="create_event_js" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Sự kiện</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form id="create_event_category_form" >
                        <div class="card-body">
                            <div class="form-group">
                                <label for="create_event_name">Tên sự kiện</label>
                                <input type="text" value="{{old('create_event_name')}}" class="form-control" name="create_event_name" id="create_event_name" placeholder="Nhập tên sự kiện">
                                <input readonly  type="text" style="color:#b83009;border:none;width:1px" id="alert_event_name">
                            </div>
                           
                            <div class="form-group">
                                <label for="create_event_des">Mô tả</label>
                                <input id="create_event_des" value="{{old('create_event_des')}}" name="create_event_des" class="form-control" placeholder="Nhập mô tả sự kiện"/>
                                <input readonly type="text" style="color:#b83009;border:none;width:1px" id="alert_event_des">
                            </div>
                            <div class="form-group">
                                <label for="create_event_category_parrent">Danh mục sự kiện</label>
                                <select class="form-control" name="create_id_danhmucsukien" id="create_id_danhmucsukien">
                                @foreach($categories as $category)--}}
                                    <option value="{{$category->id}}">{{$category->tenDanhmuc}}</option>
                                @endforeach
                                </select>
                            </div>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="submit_create_event btn btn-primary">Thêm Sự kiện</button>
                        </div>
                        @csrf
                    </form>
                </div>
            
            </div>
        </div>
        </div>
       
        
        <!-- List Categories -->
    <table class="table" style="width:1200px">
        <thead>
            <tr>
                <th style="width: 80px">
                   Chọn
                </th>
                <th style="width: 50px">ID</th>
                <th style="width: 150px">Tên sự kiện</th>
                <th style="width:600px">Mô tả</th>      
                <th >Danh mục</th>  
                <th style="width: 150px">Thao tác</th>
            </tr>
        </thead>
        <tbody>
        {!! \App\Helpers\Helper::event($events) !!}
        </tbody>
       
        <!-- End of list categories  using ajax -->
        <!-- start of Edit Categories Form -->
        <div class="modal fade" id="edit_event" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa Sự kiện</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form id="edit_event_form" >
                        <div class="card-body">
                            <div class="form-group">
                                <label for="edit_event_name">Tên sự kiện</label>
                                <input type="text"  class="name form-control" name="edit_event_name" id="edit_event_name" placeholder="Nhập tên danh mục">
                                <input readonly type="text" style="color:#b83009;border:none;width:1px" id="alert_event_name">
                            </div>
                            
                            <div class="description form-group">
                                <label for="edit_event_description">Mô tả</label>
                                <input type="text" id="edit_event_description" name="edit_event_description" class="form-control">
                                <input readonly type="text" style="color:#b83009;border:none;width:1px" id="alert_event_des">
                            </div>
                            <div class="form-group">
                                <label for="edit_event_category_parrent">Danh mục sự kiện</label>
                                <select class="form-control" name="edit_id_danhmucsukien" id= "edit_event_category_parrent">
                                @foreach($categories as $category)--}}
                                    <option id="select_edit_event_parrenttt{{$category->id}}" value="{{$category->id}}">{{$category->tenDanhmuc}}</option>
                                @endforeach
                                </select>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="submit_edit_event btn btn-primary">Lưu</button>
                        </div>
                        @csrf
                    </form>
                </div>
            
            </div>
        </div>
        </div>


        <!-- End of Edit Categories Form -->

    </table>
    {!! $events->links('pagination::bootstrap-4') !!}
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="{{asset('admin/admin/js/event.js')}}"></script>
<script>
    
</script>


@endsection
