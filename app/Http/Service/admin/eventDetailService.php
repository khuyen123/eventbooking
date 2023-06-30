<?php 
namespace App\Http\Service\admin;


use App\Models\event_detail;
use App\Repository\Eloquent\EventDetailRepository;
use App\Repository\Eloquent\EventRepository;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Svg\Tag\Rect;

class eventDetailService {
    protected $eventdetailRepository;
    protected $eventRepository;
    public function __construct(EventDetailRepository $eventdetailRepository, EventRepository $eventRepository)
    {
        $this->eventdetailRepository = $eventdetailRepository;
        $this->eventRepository = $eventRepository;
    }
    public function getAllforclient(){
        return $this->eventdetailRepository->getAll();
    }
    public function getAllorder(){
        $events = event_detail::orderbyDesc('sovedaban')->get();
        return $events;
    }
    public function getallstatisticalDate(Request $request){
        $event = event_detail::query()
        ->where('batdau','>',$request->statistical_from)
        ->where('ketthuc','<',$request->statistical_to)
        ->orderByDesc('sovedaban')
        ->get();
        return $event;
    }
    public function getAll($id_sukien){
        return $this->eventdetailRepository->searchEvent($id_sukien);
    }
    public function delete($id) {
        
        return $this->eventdetailRepository->delete($id);
    }
    public function destroyMany($request){
        return $this->eventdetailRepository->destroyMany($request);
    }
    public function update($event_detail,$data){

        $this->eventdetailRepository->update($event_detail,$data);
        Session::flash('success', 'Chỉnh sửa chi tiết sự kiện thành công');
        return true;
    }
    public function find($id){
        return $this->eventdetailRepository->find($id);
    }
    public function getEvent($event_id){
        return $this->eventRepository->find($event_id);
    }
    public function create($data) {
        $model = $this->eventdetailRepository->create($data);
        $mess = 'Thêm mới chi tiết sự kiện thành công. Hãy tiến hành thêm ảnh cho sự kiện';
        Session::flash('success', $mess);
        return $model;
        
    }
    
}