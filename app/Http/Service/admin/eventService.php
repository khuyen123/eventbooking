<?php 
namespace App\Http\Service\admin;

use App\Models\Category;
use App\Models\event;
use App\Repository\Eloquent\eventRepository;
use Illuminate\Support\Facades\Hash;

class eventService {
    protected $eventRepository;
    public function __construct(eventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }
    
    public function getAll(){
        return $this->eventRepository->getAll();
    }
    public function delete($id) {
        
        return $this->eventRepository->delete($id);
    }
    public function destroyMany($request){
        return $this->eventRepository->destroyMany($request);
    }
    public function update($event,$data){
        $this->eventRepository->update($event,$data);
        return true;
    }
    public function find($id){
        return $this->eventRepository->find($id);
    }
    public function create($data) {
        return $this->eventRepository->create($data);
    }
    public function getCategory(){
        return Category::all();
    }
}