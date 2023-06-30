
//Create Event
$(document).on('click','.submit_create_event',function(e) {
    e.preventDefault();
    var mota = $('#create_event_des').val();
    var tendanhmuc = $('#create_event_name').val();
    var id_danhmuc=$('#create_id_danhmucsukien').val();
    if (tendanhmuc.trim() == '') {
        $('#alert_event_des').val('Bạn chưa nhập tên sự kiện')
    }
    if (mota.trim()== '') {
        $('#alert_event_name').val('Bạn chưa nhập mô tả')
    }
    var data = {
        'tenSukien': tendanhmuc,
        'motaSukien': mota,
        'id_danhmucsukien':id_danhmuc
    }
    $.ajax({
        type: "POST",
        data: data,
        datatype: "JSON",
        url: "/admin/event/create",
        success: function(response) {
            if (response.error == false) {
                Swal.fire(
                    'Thành công',
                    'Thêm sự kiện mới thành công!',
                    'success'
                ).then(function(){
                    location.reload();
                })
            }
        },
        error: function(){
            Swal.fire(
                'Thất bại',
                'Thêm sự kiện mới thất bại!',
                'error'
            )
        }
    })
})
//Show-Edit Event:
function show_event(id){ 
    $('#edit_event').modal('show');
    $.ajax({
        type: "Get",
        url: "/admin/event/find/"+ id,
        datatype: "JSON",
        success: function(response){
            $('#edit_event_name').val(response.event.tenSukien),
            $('#edit_event_description').val(response.event.motaSuKien),
            document.getElementById("select_edit_event_parrenttt"+response.event.id_danhmucsukien).selected = "true";
        }
    });
    $(document).on('click','.submit_edit_event',function(e) {
        e.preventDefault();
        var mota = $('#edit_event_description').val();
        var tendanhmuc = $('#edit_event_name').val();
        var id_danhmucsukien = $('#edit_event_category_parrent').val();
        if (tendanhmuc.trim() == '') {
            $('#alert_event_name').val('Bạn chưa nhập tên Sự kiện')
        }
        if (mota.trim()== '') {
            $('#alert_event_des').val('Bạn chưa nhập mô tả')
        }
        var data = {
            'tenSukien': tendanhmuc,
            'motaSukien': mota,
            'id_danhmucsukien': id_danhmucsukien
        } 
        $.ajax({
            type: "POST",
            url: "/admin/event/edit/" + id,
            data: data,
            datatype: "JSON",
            success: function (response){
                Swal.fire(
                    'Thành Công!',
                    'Chỉnh sửa sự kiện thành công',
                    'success'
                ).then (function(){
                    id='';
                    location.reload();
                })
            }
        })
    })
}
//Delete Event:
function deleteEvent(id){
    Swal.fire({
        title: 'Bạn có muốn xóa Sự Kiện này không?',
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
                url: "/admin/event/delete/"+ id,
                success: function(result){
                    if (result.error == false) {
                        Swal.fire(
                            'Thành công',
                            'Xoá sự kiện thành công',
                            'success'
                        ).then(function(){
                            location.href= '/admin/event/index';
                        })
                    }
                },
                error: function() {
                    Swal.fire(
                        'Thất bại',
                        'Xoá sự kiện thất bại',
                        'error'
                    )
                }
            })
        }
    })
}
//Set varibles to select many event:
var event_id = [];
$(document).ready(function(){
    category_id = [];
    if (category_id.length == 0 ){
        document.getElementById("delete_all_event").disabled = true;
        document.getElementById("unselectall_event").disabled = true;
    }
})
//select manyevemnt
function selectManyevent(id){
    var check_event = document.getElementById("check_event"+id);
  
    if (check_event.checked) {        
        event_id.push(id);
        document.getElementById("delete_all_event").disabled = false;
        document.getElementById("unselectall_event").disabled = false;
        $('#check_event'+id).prop('checked',true);
    } else {
        event_id.splice(event_id.indexOf(id),1);
        if (category_id.length == 0 ){
            document.getElementById("delete_all_event").disabled = true;
            document.getElementById("unselectall_event").disabled = true;
        }
        $('#check_event'+id).prop('checked',false);
    }
}
$(document).on('click','#unselectall_event',function(){
    document.getElementById("delete_all_event").disabled = true;
    document.getElementById("unselectall_event").disabled = true;
    event_id.forEach(key => {
         $('#check_event'+key).prop('checked',false);
         event_id = [];
    });
 })
$(document).on('click','#delete_all_event',function(){
    Swal.fire(
       'Bạn có muốn xoá các Sự Kiện này không?',
       'Xoá xong không thể khôi phục',
       'warning'
    ).then(function(){
        $.ajax({
            type: "DELETE",
            datatype:"JSON",
            data: {event_id},
            url: "deleteMany",
            success: function(){
                    Swal.fire(
                        'Thành công',
                        'Xoá sự kiện thành công',
                        'success'
                    ).then(function(){
                        location.href= '/admin/event/index';
                    })
                
            },
            error: function() {
                Swal.fire(
                    'Thất bại',
                    'Xoá sự kiện thất bại',
                    'error'
                )
            }
        })
    })
})
