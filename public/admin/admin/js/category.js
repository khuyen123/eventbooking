//Event_category edit Start:
function show_category(id){
    $('#edit_event_category').modal('show');

    $.ajax({
        type: "Get",
        url: "/admin/categories/find/"+ id,
        datatype: "JSON",
        success: function(response){
            $("#edit_eventcategory_name").val(response.category.tenDanhmuc),
            $("#edit_eventcategory_description").val(response.category.mota)
        }
    });
    $(document).on('click','.submit_edit_event_category',function(e) {
        e.preventDefault();
        var mota = $('#edit_eventcategory_description').val();
        var tendanhmuc = $('#edit_eventcategory_name').val();
        if (tendanhmuc.trim() == '') {
            $('#alert_eventcate_name').val('Bạn chưa nhập tên danh mục')
        }
        if (mota.trim()== '') {
            $('#alert_eventcate_des').val('Bạn chưa nhập mô tả')
        }
        var data = {
            'tenDanhmuc': tendanhmuc,
            'mota': mota
        } 
        $.ajax({
            type: "POST",
            url: "/admin/categories/edit/" + id,
            data: data,
            datatype: "JSON",
            success: function (response){
                Swal.fire(
                    'Thành Công!',
                    'Chỉnh sửa danh mục thành công',
                    'success'
                ).then (function(){
                    location.reload();
                })
            }
        })
    })
}
//Delete Event Category:
function deleteEventcategory(id){
    Swal.fire({
        title: 'Bạn có muốn xóa danh mục này không?',
        text: "Xóa xong không thể khôi phục!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xác nhận!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                datatype:"JSON",
                url: "/admin/categories/delete/"+ id,
                success: function(result){
                    if (result.error == false) {
                        Swal.fire(
                            'Thành công',
                            'Xoá danh mục thành công',
                            'success'
                        ).then(function(){
                            location.href='/admin/categories/index';
                        })
                    }
                },
                error: function() {
                    Swal.fire(
                        'Thất bại',
                        'Xoá danh mục thất bại',
                        'error'
                    )
                }
            })
        }
    })
}
//Create Category
$(document).on('click','.submit_create_event_category',function(e) {
    e.preventDefault();
    var mota = $('#create_event_category_des').val();
    var tendanhmuc = $('#create_event_category_name').val();
    if (tendanhmuc.trim() == '') {
        $('#alert_eventcate_name').val('Bạn chưa nhập tên danh mục')
    }
    if (mota.trim()== '') {
        $('#alert_eventcate_des').val('Bạn chưa nhập mô tả')
    }
    var data = {
        'tenDanhmuc': tendanhmuc,
        'mota': mota
    }
    $.ajax({
        type: "POST",
        data: data,
        datatype: "JSON",
        url: "/admin/categories/create",
        success: function(response) {
            if (response.error == false) {
                Swal.fire(
                    'Thành công',
                    'Thêm danh mục mới thành công!',
                    'success'
                ).then(function(){
                    location.reload();
                })
            }
        },
        error: function(){
            Swal.fire(
                'Thất bại',
                'Thêm danh mục mới thất bại!',
                'error'
            )
        }
    })
})
var category_id = [];
$(document).ready(function(){
    category_id = [];
    if (category_id.length == 0 ){
        document.getElementById("delete_all_categories").disabled = true;
        document.getElementById("unselectall_categories").disabled = true;
    }
})
//select Many Category:
function selectManycategory(id){
    var check_category = document.getElementById("check_category"+id);
    
    if (check_category.checked) {
        category_id.push(id);
        document.getElementById("delete_all_categories").disabled = false;
        document.getElementById("unselectall_categories").disabled = false;
        $('#check_category'+id).prop('checked',true);
    } else {
        category_id.splice(category_id.indexOf(id),1);
        if (category_id.length == 0 ){
            document.getElementById("delete_all_categories").disabled = true;
            document.getElementById("unselectall_categories").disabled = true;
        }
        $('#check_category'+id).prop('checked',false);
    }
}
//Unselect:
$(document).on('click','#unselectall_categories',function(){
    document.getElementById("delete_all_categories").disabled = true;
            document.getElementById("unselectall_categories").disabled = true;
   category_id.forEach(key => {
        $('#check_category'+key).prop('checked',false);
        category_id = [];
   });
})
//Delete many Category:
$(document).on('click','#delete_all_categories',function(){

    Swal.fire(
       'Bạn có muốn xoá các danh mục này không?',
       'Xoá xong không thể khôi phục',
       'warning'
    ).then(function(){
        $.ajax({
            type: "DELETE",
            datatype:"JSON",
            data: {category_id},
            url: "deleteMany",
            success: function(){
                    Swal.fire(
                        'Thành công',
                        'Xoá danh mục thành công',
                        'success'
                    ).then(function(){
                        location.href='/admin/categories/index';
                    })
                
            },
            error: function() {
                Swal.fire(
                    'Thất bại',
                    'Xoá danh mục thất bại',
                    'error'
                )
            }
        })
    })
})
