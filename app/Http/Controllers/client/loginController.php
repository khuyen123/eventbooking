<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\client\changePassRequest;
use App\Http\Requests\client\forgotpasswordRequest;
use App\Http\Requests\client\loginRequest;
use App\Http\Requests\client\sigupRequest;
use App\Http\Service\admin\bannerService;
use App\Http\Service\admin\pageInforService;
use App\Http\Service\client\userService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    protected $userService,$bannerService,$pageInforService;
    public function __construct(userService $userService, bannerService $bannerService,pageInforService $pageInforService)
    {
        $this->userService = $userService;
        $this->bannerService = $bannerService;
        $this->pageInforService = $pageInforService;
    }
    public function login(){
        $page_infor = $this->pageInforService->getAll();
        $banners = $this->bannerService->getAll();
        if (Auth::check()) {
            return redirect()->route('home');
        } else {
        return view('client.user.login',[
            'page_infor' => $page_infor,
            'banners' => $banners
        ]);
        }
       
    }
    public function changepass_index($user_id){
        if ($user_id!=Auth::user()->id) {
            return redirect()->back();
        }
        if (!Auth::check()) {
            return redirect()->back();
        }
        $page_infor = $this->pageInforService->getAll();
        $banners = $this->bannerService->getAll();
        $new_user = $this->userService->find($user_id);
        $token = $this->userService->rand_string(6);
        $data['makichhoat'] = $token;
        $this->userService->update($new_user,$data);
        Mail::send('client.forgot_password_mail',compact('new_user'), function($email) use ($new_user){
            $email->subject('Mã Xác nhận lấy lại mật khẩu');
            $email->to($new_user->email, $new_user->hoten);
        });
        Session::flash('success','Xin chào: '.$new_user->hoten.' ! Mã xác nhận đã được gửi qua Email đăng ký của bạn!');
        return view('client.user.changepass',['page_infor'=>$page_infor,'banners'=>$banners]);
    }
    public function changepass_store($user_id,changePassRequest $request){
        if ($user_id!=Auth::user()->id) {
            return redirect()->back();
        }
        $user = $this->userService->find($user_id);
        if ($request->newpass_token == $user->makichhoat) {
                $data['password'] = Hash::make($request->newpass); 
                $data['makichhoat'] = '';
                $this->userService->update($user,$data);
                Session::flash('success','Lấy lại mật khẩu thành công!');
                return redirect()->to('/client/infor/'.$user_id.'/index')->with('changepass_success','1');
        } 
        Session::flash('error','Mã xác nhận không chính xác!');
        return redirect()->back();
    }
    public function forgot_password(){
        $page_infor = $this->pageInforService->getAll();
        if (Auth::check()) {
            return redirect()->back();
        }
        $banners = $this->bannerService->getAll();
        return view('client.user.forgot_password',['banners'=> $banners,'page_infor'=>$page_infor]);
    }
    public function forgot_password_find(forgotpasswordRequest $request){
        if (Auth::check()) {
            return redirect()->back();
        }
        $new_user = $this->userService->search_forgot($request->email);
        $banners = $this->bannerService->getAll();
        if ($new_user == null) {
            Session::flash('error','Không tìm thấy người dùng');
            return redirect()->back();
        }
        $token = $this->userService->rand_string(6);
        $data['makichhoat'] = $token;
        $this->userService->update($new_user,$data);
        Mail::send('client.forgot_password_mail',compact('new_user'), function($email) use ($new_user){
            $email->subject('Mã Xác nhận lấy lại mật khẩu');
            $email->to($new_user->email, $new_user->hoten);
        });
        Session::flash('success','Xin chào: '.$new_user->hoten.' ! Mã xác nhận đã được gửi qua Email đăng ký của bạn!');
        return redirect()->to('/client/password_newpass/'.$new_user->id);
    }
    public function newPass($user_id){
        $page_infor = $this->pageInforService->getAll();
        $banners = $this->bannerService->getAll();
        if (Auth::check()) {
            return redirect()->back();
        }
        return view('client.user.forgot_password_newpassword',['banners'=>$banners,'page_infor'=>$page_infor]);
    }
    public function newPass_store($user_id,changePassRequest $request){
       $user = $this->userService->find($user_id);
       if ($request->newpass_token == $user->makichhoat) {
            $data['password'] = Hash::make($request->newpass); 
            $data['makichhoat'] = '';
            $this->userService->update($user,$data);
            Session::flash('success','Lấy lại mật khẩu thành công!');
            return redirect()->route('login');
       } 
       Session::flash('error','Mã xác nhận không chính xác!');
       return redirect()->back();
    }
    public function login_function(loginRequest $request){
        if ((Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])) || 
        (Auth::attempt(['username'=>$request->input('email'),'password'=>$request->input('password')]))) {
                if (Auth::user()->kichhoat == 0){
                    Auth::logout();
                    Session::flash('error','Tài khoản chưa kích hoạt');
                    return redirect()->back();
                } elseif (Auth::user()->kichhoat == 1) {
                    if (Auth::user()->trangthai == 0) {
                        Auth::logout();
                        Session::flash('error','Tài khoản đang tạm khoá');
                        return redirect()->back();
                    } elseif (Auth::user()->kichhoat == 1) {
                        return redirect()->route('home');
                    }
                }
            
        }  else {
            Session::flash('error','Tài khoản hoặc mật khẩu chưa chính xác');
            return redirect()->back();
        }
        
    }
    public function sigout() {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('home');
        } else {
            return redirect()->back();
        }
    }
    public function sigup() {
        $page_infor = $this->pageInforService->getAll();
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('client.user.register',[
            'page_infor' => $page_infor
        ]);
    } 
    public function sigup_function(sigupRequest $request){
        $result = $this->userService->register($request);
        if ( ($new_user =  $result) && $result!=false) {
            Mail::send('client.active_account',compact('new_user'), function($email) use ($new_user){
                $email->subject('Xác nhận tài khoản đăng ký');
                $email->to($new_user->email, $new_user->hoten);
            });
            Session::flash('success','Đăng ký thành công! Bạn hãy kiểm tra Email để kích hoạt tài khoản');
            return redirect()->route('login');
        } 
        return redirect()->back();
       
    }
    public function active_account($user_id){
        $user = $this->userService->find($user_id);
        $data['trangthai'] = 1;
        $data['kichhoat'] = 1;
        $data['makichhoat'] = '';
        if ($user){
            $this->userService->update($user,$data);
            Session::flash('success','Kích hoạt thành công! Bạn có thể đăng nhập!');
            return redirect()->route('login');
        }
    }
}
