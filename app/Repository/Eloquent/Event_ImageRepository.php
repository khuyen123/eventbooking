<?php 
namespace App\Repository\Eloquent;

use App\Models\event_image;
use App\Repository\Event_ImageRepositoryInterface;


class Event_ImageRepository extends BaseRepository implements Event_ImageRepositoryInterface
{
    /** 
      * Hàm constructor.
    *
    * @param event_image $category
    */
   public function __construct(event_image $event_image)
   {
       // Khai báo model 
       parent::__construct($event_image);
   }
   public function getAll()
   {
        return event_image::orderby('id')->paginate(7);
   }
   
   public function destroyMany($request)
   {
      try {
        return event_image::destroy($request->event_id);
      } catch (\Throwable $th) {
        return false;
      }
       
   }
   
}