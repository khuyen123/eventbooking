<?php 
namespace App\Repository\Eloquent;

use App\Models\event;
use App\Repository\EventRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class EventRepository extends BaseRepository implements EventRepositoryInterface
{
    /** 
      * Hàm constructor.
    *
    * @param Category $category
    */
   public function __construct(event $event)
   {
       // Khai báo model 
       parent::__construct($event);
   }
   public function getAll()
   {
        return event::orderby('id')->paginate(5);
   }
   
   public function destroyMany($request)
   {
      try {
        return event::destroy($request->event_id);
      } catch (\Throwable $th) {
        return false;
      }
       
   }
   public function search($request)
   {
        $event = event::query()
            ->where('tensukien', 'LIKE', "%{$request->search_string}%") ;
            return $event;
   }
}