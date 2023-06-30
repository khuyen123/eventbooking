<?php 
namespace App\Http\Service\admin;

use App\Models\page_infor;

class pageInforService {
    public function getAll(){
        $infor = page_infor::query()
        ->where('trangthai','=',1)
        ->first();
        return $infor;
    }
    public function getAllforAdmin(){
        return page_infor::all();
    }
    public function create($data){
        $result = page_infor::create($data);
        return $result;
    }
    public function find($id){
        return page_infor::query()
        ->where('id','=',$id)
        ->first();
    }
    public function delete($infor){
        $result = page_infor::destroy($infor);
        return $result;
    }
    public function lock($infor,$data){
        $result = page_infor::where('id','=',$infor->id)
        ->update(['trangthai'=>$data]);
        return $result;
    }
    public function update($infor,$data){
        $result = $infor->update($data);
        return $result;
    }
}
