<?php

namespace App\Http\Controllers\admin\event;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Event\event_createRequest;
use App\Http\Requests\admin\Event\event_updateRequest;
use App\Http\Service\admin\eventService;
use Illuminate\Http\Request;

class eventcontroller extends Controller
{
    protected $eventService;
    public function __construct(eventService $eventService)
    {
        $this->eventService = $eventService;
    }
    public function index(){
        $categories=$this->eventService->getCategory();
        $events = $this->eventService->getAll();
        return view('admin.event.event_index',[
            'title' => 'Sự kiện',
            'events' => $events,
            'categories'=>$categories
        ]);
    }
    public function create_store(event_createRequest $request){
        $data = $request->all();
        $result = $this->eventService->create($data);
        if ($result!=null) {
            return response()->json([
                'error' => false,
                'message' => "Thêm thành công"
            ]); 
        } else {
            return response()->json([
                'error'=>true
            ]);
        }
    }
    public function find($id){
        $event = $this->eventService->find($id);
        if ($event){
            return response()->json([
                'status' => 200,
                'event' =>$event
            ]);
        } else {
            return response()->json([
                'status'=>404,
                'message' => "Not Found"
            ]);
        }
    }
    public function edit_store($id,event_updateRequest $request){
        $category = $this->eventService->find($id);
        $data = $request->all();
        return $this->eventService->update($category,$data);
    }
    public function deleteOneevent($id) {
        $result=$this->eventService->delete($id);
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
    public function deleteManyEvent(Request $request) {
      
        $result=$this->eventService->destroyMany($request);
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
