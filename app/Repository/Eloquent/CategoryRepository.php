<?php 
namespace App\Repository\Eloquent;

use App\Models\Category;
use App\Repository\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /** 
      * Hàm constructor.
    *
    * @param Category $category
    */
   public function __construct(Category $category)
   {
       // Khai báo model 
       parent::__construct($category);
   }
   public function getAll()
   {
        return Category::orderby('id')->paginate(5);
   }
   
   public function destroyMany($request)
   {
      try {
        return Category::destroy($request->category_id);
      } catch (\Throwable $th) {
        return false;
      }
       
   }
   public function search($request)
   {
        $category = Category::query()
            ->where('tenDanhmuc', 'LIKE', "%{$request->search_string}%") ;
            return $category;
   }
}