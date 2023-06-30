<?php 
namespace App\Http\Service\admin;

use App\Models\Category;
use App\Repository\Eloquent\CategoryRepository;
use Illuminate\Support\Facades\Hash;

class categoryService {
    protected $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function getAll(){
        return $this->categoryRepository->getAll();
    }
    public function delete($id) {
        
        return $this->categoryRepository->delete($id);
    }
    public function destroyMany($request){
        return $this->categoryRepository->destroyMany($request);
    }
    public function update($category,$data){
        $this->categoryRepository->update($category,$data);
        return true;
    }
    public function find($id){
        return $this->categoryRepository->find($id);
    }
    public function create($data) {
        return $this->categoryRepository->create($data);
    }
}