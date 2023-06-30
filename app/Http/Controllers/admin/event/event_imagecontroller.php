<?php

namespace App\Http\Controllers\admin\event;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Event\event_imageRequest;
use App\Http\Service\admin\event_imageService;
use App\Models\event_detail;
use App\Models\event_image;
use Illuminate\Http\Request;

class event_imagecontroller extends Controller
{
    protected $event_imageService;
    public function __construct(event_imageService $event_imageService)
    {
        $this->event_imageService = $event_imageService;
    }
    public function index(){
        $event_detail = event_detail::all();
        return view('admin.event.event_list_toimage',[
            'title'=>"Hình ảnh sự kiện",
            'event_details' => $event_detail
        ]);
    }
    public function list_image($eventdetail_id){
        $images = $this->event_imageService->findImage($eventdetail_id);
        return view('admin.event.event_image',[
            'images' => $images,
            'title'=>'Quản lý ảnh sự kiện: '.$this->event_imageService->findeventdetail($eventdetail_id)->event->tenSukien.'-' . $this->event_imageService->findeventdetail($eventdetail_id)->wards->district->province->tentinhthanh
        ]);
    }
    public function create($eventdetail_id){

        return view('admin.event.event_image_create',[
            'title' => 'Thêm Hình ảnh sự kiện: '.$this->event_imageService->findeventdetail($eventdetail_id)->event->tenSukien.'-' . $this->event_imageService->findeventdetail($eventdetail_id)->wards->district->province->tentinhthanh
        ]);
    }
    public function store($eventdetail_id,event_imageRequest $request){
        if($request->has('event_image')){
            $file = $request->file('event_image');
            $ext = $request->file('event_image')->extension();
            $file_name = time().'-event_detail-'.$eventdetail_id.'.'.$ext;
            $file->move(public_path('client/Image'),$file_name);
        }
        $request->merge(['noidung'=>'Image/'.$file_name]);
        $data['id_chitietsukien'] = $eventdetail_id;
        $data['noidung'] = $request->noidung;
        $data['mota'] = $request->event_image_dess;
        $this->event_imageService->create($data);
        return redirect()->back();
    }
    public function delete($eventdetail_id,$image_id){
        $result = $this->event_imageService->delete($image_id);
        return $result;
    }
}
