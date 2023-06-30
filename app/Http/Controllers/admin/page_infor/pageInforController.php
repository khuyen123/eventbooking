<?php

namespace App\Http\Controllers\admin\page_infor;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Event\pageInforCreateRequest;
use App\Http\Requests\admin\Event\pageInforUpdateRequest;
use App\Http\Service\admin\pageInforService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class pageInforController extends Controller
{
    protected $pageinforService;
    public function __construct(pageInforService $pageinfor)
    {
        $this->pageinforService = $pageinfor;
    }
    public function index(){
        $infors = $this->pageinforService->getAllforAdmin();
        if (Auth::user()->quyentruycap !=3) {
            return redirect()->back();
        }
        return view('admin.page_infor.index',[
            'title' =>'Quản lý Thông tin trang chủ',
            'infors' => $infors
        ]);
    }
    public function create(){
        if (Auth::user()->quyentruycap !=3){
            return redirect()->back();
        }
        return view('admin.page_infor.create',[
            'title'=>'Thêm mới thông tin trang chủ'
        ]);
    }
    public function store(pageInforCreateRequest $request){
        if (Auth::user()->quyentruycap !=3){
            return redirect()->back();
        }
        $data['tieude_vechungtoi'] = $request->title_aboutus;
        $data['noidung_vechungtoi'] = $request->content_aboutus;
        $data['email_trangchu'] = $request->email_page;
        $data['sdt_trangchu'] = $request->phone_page;
        $data['diachi_trangchu'] = $request->address_page;
        $data['tieude_trangchu'] = $request->title_page;
        $data['noidung_trangchu'] = $request->content_page;
        $data['trangthai'] = 0;
        $result = $this->pageinforService->create($data);
        if ($result) {
            Session::flash('success','Thêm mới thành công');
            return redirect()->to('/admin/page_infor/index');
        } else {
            return redirect()->back();
        }
    }
    public function delete($id){
        $infor = $this->pageinforService->find($id);
        return $this->pageinforService->delete($infor);
    }
    public function unlock($id){
        $infors = $this->pageinforService->getAllforAdmin();
        foreach($infors as $infor){
            if ($infor->id != $id) {
                $this->pageinforService->lock($infor,0);
            } else {
                $result = $this->pageinforService->lock($infor,1);
            }
        } 
        return $result;
    }
    public function edit($id){
        if (Auth::user()->quyentruycap !=3){
            return redirect()->back();
        }
        $pageinfor = $this->pageinforService->find($id);
        return view('admin.page_infor.edit',[
            'title' => 'Chỉnh sửa thông tin trang chủ',
            'pageinfor' => $pageinfor
        ]);
    }
    public function edit_store($id,pageInforUpdateRequest $request){
        $infor = $this->pageinforService->find($id);
        $data['tieude_vechungtoi'] = $request->title_aboutus;
        $data['noidung_vechungtoi'] = $request->content_aboutus;
        $data['email_trangchu'] = $request->email_page;
        $data['sdt_trangchu'] = $request->phone_page;
        $data['diachi_trangchu'] = $request->address_page;
        $data['tieude_trangchu'] = $request->title_page;
        $data['noidung_trangchu'] = $request->content_page;
        $data['trangthai'] = 0;
        $result = $this->pageinforService->update($infor,$data);
        if ($result) {
            Session::flash('success','Chỉnh sửa thành công');
            return redirect()->back();
        }
        return redirect()->back();
    }
}
