<?php 
namespace App\Repository\Eloquent;

use App\Models\titket;

use App\Repository\TitketRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class TitketRepository extends BaseRepository implements TitketRepositoryInterface
{
    /** 
      * Hàm constructor.
    *
    * @param Category $category
    */
   public function __construct(titket $titket)
   {
       // Khai báo model 
       parent::__construct($titket);
   }
   public function getAll()
   {
        return titket::all();
   }
   
   public function destroyMany($request)
   {
      try {
        return titket::destroy($request->event_id);
      } catch (\Throwable $th) {
        return false;
      }
       
   }
   public function search($request)
   {
        $event = titket::query()
            ->where('id_ve', 'LIKE', "%{$request->search_string}%") ;
            return $event;
   }
}