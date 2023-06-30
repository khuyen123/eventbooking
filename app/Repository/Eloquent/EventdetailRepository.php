<?php 
namespace App\Repository\Eloquent;

use App\Models\event_detail;
use App\Repository\EventDetailRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class EventDetailRepository extends BaseRepository implements EventDetailRepositoryInterface
{
    /** 
      * Hàm constructor.
    *
    * @param Category $category
    */
   public function __construct(event_detail $event_detail)
   {
       // Khai báo model 
       parent::__construct($event_detail);
   }
   public function getAll()
   {
        return event_detail::all();
   }
   
   public function destroyMany($request)
   {
      try {
        return event_detail::destroy($request->event_id);
      } catch (\Throwable $th) {
        return false;
      }
       
   }
   public function searchEvent($id_sukien)
   {
        $event = event_detail::query() ->where('id_sukien','=',$id_sukien)->get();
        return $event;
   }
}