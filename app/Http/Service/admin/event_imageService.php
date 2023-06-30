<?php 
namespace App\Http\Service\admin;

use App\Models\event_detail;
use App\Models\event_image;

use App\Repository\Eloquent\Event_ImageRepository;
use App\Repository\Eloquent\EventDetailRepository;
use Illuminate\Support\Facades\Session;

class event_imageService {
    protected $event_imageRepository;
    protected $eventdetailrepository;
    public function __construct(Event_ImageRepository $event_imageRepository, EventDetailRepository $eventDetailRepository)
    {
        $this->event_imageRepository = $event_imageRepository;
        $this->eventdetailrepository = $eventDetailRepository;
    }
    
    public function getAll(){
        return $this->event_imageRepository->getAll();
    }
    public function findImage($detail_id){
        $images = event_image::query()
        ->where('id_chitietsukien','=',$detail_id)
        ->get();
        return $images;
    }
    public function delete($id) {
        return $this->event_imageRepository->delete($id);
    }
    public function destroyMany($request){
        return $this->event_imageRepository->destroyMany($request);
    }
    public function update($event,$data){
        $this->event_imageRepository->update($event,$data);
        return true;
    }
    public function find($id){
        return $this->event_imageRepository->find($id);
    }
    public function create($data) {
        Session::flash('success', 'Thêm mới hình ảnh thành công');
        return $this->event_imageRepository->create($data);
    }
    public function getevent_detail(){
        return event_detail::all();
    }
    public function findeventdetail($id){
        return $this->eventdetailrepository->find($id);
    }
}