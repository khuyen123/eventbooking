<?php

namespace App\Http\Controllers\admin\banner;

use App\Http\Controllers\Controller;
use App\Http\Service\admin\bannerService;
use App\Http\Service\admin\userService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class bannerController extends Controller
{
    protected $bannerService;
    public function __construct(bannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }
    public function index(){
        if (Auth::user()->quyentruycap !=3) {
            return redirect()->back();
        }
        $banners = $this->bannerService->getAll();
        return view('admin.banner.index',[
            'images'=> $banners,
            'title' =>'Quản lý Banner'
        ]);
    }
    public function create(){
        if (Auth::user()->quyentruycap !=3) {
            return redirect()->back();
        }
        return view('admin.banner.create',[
            'title'=>'Thêm mới Banner'
        ]);
    }
    public function store(Request $request){
        if (Auth::user()->quyentruycap !=3) {
            return redirect()->back();
        }
        if($request->has('banner_noidung')){
            $file = $request->file('banner_noidung');
            $ext = $request->file('banner_noidung')->extension();
            $file_name = time().'-banner_noidung-'.'.'.$ext;
            $file->move(public_path('client/Image'),$file_name);
        }
        $request->merge(['noidung'=>'client/Image/'.$file_name]);
        $data['noidung'] = $request->noidung;
        $data['mota'] = $request->banner_des;
        $this->bannerService->create($data);
        return redirect()->back();
    }
    public function delete($banner_id){
        if (Auth::user()->quyentruycap !=3) {
            return redirect()->back();
        }
        return $this->bannerService->delete($banner_id);
    }
}
