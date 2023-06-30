<?php

namespace App\Http\Controllers\admin\event;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Event\eventdetail_createRequest;
use App\Http\Requests\admin\Event\eventdetail_updateRequest;
use App\Http\Service\admin\eventDetailService;
use App\Models\province;
use Illuminate\Http\Request;

class event_detailcontroller extends Controller
{
    protected $eventdetailService;
    public function __construct(eventDetailService $eventdetailService)
    {
        $this->eventdetailService = $eventdetailService;
    }
    public function index($id_sukien){
        $event = $this->eventdetailService->getEvent($id_sukien);
        return view('admin.event.event_detail',[
            'title'=> 'Chi tiết sự kiện: '. $event->tenSukien,
            'event_details'=>$this->eventdetailService->getAll($id_sukien)
        ]);
    }
    public function edit_index($id_sukien,$eventdetail_id){
        $event = $this->eventdetailService->getEvent($id_sukien);
        return view('admin.event.event_detail_edit',[
            'title'=>'Chỉnh sửa sự kiện: '.$event->tenSukien,
            'provinces' => province::all(),
            'event_detail' => $this->eventdetailService->find($eventdetail_id)
        ]);
    }
    public function create_index($id_sukien){
        return view('admin.event.event_detail_create',[
            'title'=>'Thêm mới chi tiết sự kiện: '.$this->eventdetailService->getEvent($id_sukien)->tenSukien,
            'provinces' => province::all()
        ]);
    }
    public function create_store(eventdetail_createRequest $request,$id_sukien){

        $data['batdau'] = $request->start_time_detail;
        $data['ketthuc'] = $request->end_time_detail;
        $data['diachi'] = $request->detail_address;
        $data['khuvuc'] = $request->detail_locate;
        $data['sovetoida'] = $request->detail_maxtitket;
        $data['sovedaban'] = 0;
        $data['trangthai'] = 1;
        $data['giave'] = $request->detail_prince;
        $data['dotuoichophep'] = $request->detail_yearold;
        $data['mota'] = $request->detail_description;
        $data['sdt_lienhe'] = $request->contact_phone_detail;
        $data['email_lienhe'] = $request->contact_email_detail;
        $data['ten_lienhe'] = $request->contact_name_detail;
        $data['id_sukien'] = $id_sukien;
        $data['id_xaphuong'] = $request->detail_wards;
        $data['id_hinhthucve'] = $request->hinhthucve;
        $data['sohangghe'] = $request->totalrow_creat;
        $data['soghemoihang'] = $request->totalseat_row_create;
        $this->eventdetailService->create($data);
        $url='admin/event_detail/'.$id_sukien.'/index';
        return redirect($url);
        
    }
    public function edit_store(eventdetail_updateRequest $request,$id_sukien,$eventdetail_id){

        $data['batdau'] = $request->start_time_detail;
        $data['ketthuc'] = $request->end_time_detail;
        $data['diachi'] = $request->detail_address;
        $data['khuvuc'] = $request->detail_locate;
        $data['sovetoida'] = $request->detail_maxtitket;
        $data['sovedaban'] = 0;
        $data['trangthai'] = 1;
        $data['giave'] = $request->detail_prince;
        $data['dotuoichophep'] = $request->detail_yearold;
        $data['mota'] = $request->detail_description;
        $data['sdt_lienhe'] = $request->contact_phone_detail;
        $data['email_lienhe'] = $request->contact_email_detail;
        $data['ten_lienhe'] = $request->contact_name_detail;
        $data['id_sukien'] = $id_sukien;
        $data['id_xaphuong'] = $request->detail_wards;
        $data['id_hinhthucve'] = $request->hinhthucve;
        $data['sohangghe'] = $request->totalrow_creat;
        $data['soghemoihang'] = $request->totalseat_row_create;
        $event_detail = $this->eventdetailService->find($eventdetail_id);
        $this->eventdetailService->update($event_detail,$data);
        $url='admin/event_detail/'.$id_sukien.'/index';
        return redirect($url);
    }
    public function close(Request $request,$id_sukien,$eventdetail_id){
        $event_detail = $this->eventdetailService->find($eventdetail_id);
        return $this->eventdetailService->update($event_detail,$request->input());
    }
    public function delete($id_sukien,$eventdetail_id){
        $result=$this->eventdetailService->delete($eventdetail_id);
        if ($result){
            return response()->json([
                'error'=> false,
                'message'=>"Xóa thành công"
            ]);
        } else
        return response()->json([
            'error'=>true
        ]);
    }
}
