@extends('admin.main')

@section('content')
    <div class="container-fluid">
        <button style="width:150px" type="button" class="btn btn-success" data-toggle="modal" data-target="#create_event_category_js">
            Thêm danh mục
        </button>
        <button style="width:150px" type="button" class="btn btn-warning" data-toggle="modal" id="unselectall_categories">
            Bỏ chọn
        </button>
        <button style="width:150px" type="button" class="btn btn-danger" data-toggle="modal" id="delete_all_categories">
            Xóa hết
        </button>
    </div>
<!-- Form Create Categories_ Ajax -->
        <div class="modal fade" id="create_event_category_js" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form id="create_event_category_form" >
                        <div class="card-body">
                            <div class="form-group">
                                <label for="create_event_category_name">Tên danh mục</label>
                                <input type="text" value="{{old('create_event_category_name')}}" class="form-control" name="create_event_category_name" id="create_event_category_name" placeholder="Nhập tên danh mục">
                                <input  readonly type="text" style="color:#b83009;border:none;width:1px" id="alert_eventcate_name">
                            </div>
                           
                            <div class="form-group">
                                <label for="create_event_category_des">Mô tả</label>
                                <input id="create_event_category_des" value="{{old('create_event_category_des')}}" name="create_event_category_des" class="form-control" placeholder="Nhập mô tả danh mục"/>
                                <input  readonly type="text" style="color:#b83009;border:none;width:1px" id="alert_eventcate_des">
                            </div>

        </div>
                        <div class="modal-footer">
                            <input  readonly type="text" style="color:#b83009;border:none;width:300px" id="alert_eventcate_des"><button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="submit_create_event_category btn btn-primary">Thêm danh mục</button>
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
                <th style="width: 150px">Tên danh mục</th>
                <th >Mô tả</th>        
                <th style="width: 150px">Thao tác</th>
            </tr>
        </thead>
        <tbody>
        {!! \App\Helpers\Helper::category($categories) !!}
        </tbody>
       
        <!-- End of list categories  using ajax -->
        <!-- start of Edit Categories Form -->
        <div class="modal fade" id="edit_event_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa danh mục</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form id="edit_event_category_form" >
                        <div class="card-body">
                            <div class="form-group">
                                <label for="edit_eventcategory_name">Tên danh mục</label>
                                <input type="text"  class="name form-control" name="edit_eventcategory_name" id="edit_eventcategory_name" placeholder="Nhập tên danh mục">
                                <input readonly type="text" style="color:#b83009;border:none;width:1px" id="alert_eventcate_name">
                            </div>
                            
                            <div class="description form-group">
                                <label for="edit_eventcategory_description">Mô tả</label>
                                <input type="text" id="edit_eventcategory_description" name="edit_eventcategory_description" class="form-control">
                                <input  readonly type="text" style="color:#b83009;border:none;width:1px" id="alert_eventcate_des">
                            </div>
                           
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="submit_edit_event_category btn btn-primary">Lưu</button>
                        </div>
                        @csrf
                    </form>
                </div>
            
            </div>
        </div>
        </div>


        <!-- End of Edit Categories Form -->

    </table>
    {!! $categories->links('pagination::bootstrap-4') !!}
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="{{asset('admin/admin/js/category.js')}}"></script>
<script>
    
</script>


@endsection
