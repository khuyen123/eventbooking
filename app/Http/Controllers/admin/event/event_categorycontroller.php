<?php

namespace App\Http\Controllers\admin\event;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Event\event_category_createRequest;
use App\Http\Requests\admin\Event\event_category_updateRequest;
use App\Http\Service\admin\categoryService;
use Illuminate\Http\Request;

class event_categorycontroller extends Controller
{
    protected $categoryService;
    public function __construct(categoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index(){
        $categories = $this->categoryService->getAll();
        return view('admin.event.event_category',[
            'title' => 'Danh mục sự kiện',
            'categories' => $categories
        ]);
    }
    public function find($id){
        $category = $this->categoryService->find($id);
        if ($category){
            return response()->json([
                'status' => 200,
                'category' =>$category
            ]);
        } else {
            return response()->json([
                'status'=>404,
                'message' => "Not Found"
            ]);
        }
    }
    public function getall(){
        return response()->json([
            'categories'=>$this->categoryService->getAll()
        ]);
    }
    public function edit_store($id,event_category_updateRequest $request){
        $category = $this->categoryService->find($id);
        $data = $request->all();
        return $this->categoryService->update($category,$data);
    }
    public function deleteOneCategory($id) {
        $result=$this->categoryService->delete($id);
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
    public function deleteManyCategory(Request $request) {
      
        $result=$this->categoryService->destroyMany($request);
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
    public function create_category(event_category_createRequest $request) {
        $data = $request->all();
        $result = $this->categoryService->create($data);
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
   
}
