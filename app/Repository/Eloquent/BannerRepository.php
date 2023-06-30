<?php 
namespace App\Repository\Eloquent;

use App\Models\banner;
use App\Repository\BannerRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class BannerRepository extends BaseRepository implements BannerRepositoryInterface
{
    /** 
      * Hàm constructor.
    *
    * @param banner $user
    */
   public function __construct(banner $banner)
   {
       // Khai báo model 
       parent::__construct($banner);
   }
   public function getAll()
   {
        return banner::orderby('id')->paginate(10);
   }
   
   public function destroyMany($request)
   {
        try {
            return banner::destroy($request->id); 
        } catch (\Throwable $th) {
            return false;
        }
   }

}