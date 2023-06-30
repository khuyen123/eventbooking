<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Service\admin\eventDetailService;
use App\Http\Service\admin\userService;
use App\Http\Service\client\titketService;
use App\Models\titket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class basecontroller extends Controller
{
    protected $ticketService,$userService,$eventDetailService;
    public function __construct(titketService $titketService, userService $userService, eventDetailService $eventDetailService)
    {
        $this->ticketService = $titketService;
        $this->userService = $userService;
        $this->eventDetailService = $eventDetailService;
    }
    public function index(){
        $amount = 0;
        $tickets = $this->ticketService->getAll();
        $users = $this->userService->getAll();
        $events = $this->eventDetailService->getAllforclient();
        $count_event = 0;
        $count_user = 0;
        foreach($users as $user){
            if ($user->quyentruycap == 1){
                $count_user += 1;
            }
        }
        foreach($events as $event)
        {
            $amount += $event->giave*$event->sovedaban;
        }
        foreach($events as $event){
                $count_event += 1;
        }
        if (Auth::check()) {
            if (Auth::user()->quyentruycap == 2 || Auth::user()->quyentruycap == 3) {
            return view('admin.home',[
                'title' => 'Sự kiện số | Trang quản trị',
                'count_ticket' => $tickets->count(),
                'ticket_amount' =>$amount,
                'count_users' => $count_user,
                'count_events' => $count_event
            ]);
            } elseif (Auth::user()->quyentruycap == 1) {
                return redirect()->route('home');
            } 
        } 
        return redirect()->route('login');
    }
    public function event_statistical(){
        $event = $this->eventDetailService->getAllorder();
        return view('admin.event_statistical.event_event_statistical',[
            'title'=>'Thống kê Sự kiện',
            'events'=>$event
        ]);
    }
    public function event_statisticalDate(Request $request){
        
        $event = [];
        if (isset($request->statistical_from) && isset($request->statistical_to)){
            $events = $this->eventDetailService->getallstatisticalDate($request);
        } else {
            $events = $this->eventDetailService->getAllorder();
        }
        if ($request->tinhtrang == 2) {
            $event = $events;
        } else {
            foreach ($events as $key) {
                if ($key->trangthai == $request->tinhtrang) {
                    array_push($event,$key);
                }
            }
        }
        return view('admin.event_statistical.event_event_statistical',[
            'title'=>'Thống kê Sự kiện',
            'from'=>$request->statistical_from,
            'to'=>$request->statistical_to,
            'events'=>$event
        ]);
    }
    public function eventDetail_statistical($event_id){
        $event = $this->eventDetailService->find($event_id);
        $tickets = titket::query()
        ->where('id_chitietsukien','=',$event_id)
        ->get();
        return view('admin.event_statistical.eventdetail_event_statistical',[
            'title'=> 'Thống kê doanh thu sự kiện: '. $event->event->tenSukien.'- '.$event->wards->district->province->tentinhthanh
            .'. Tổng tiền vé đã bán được: '.number_format($event->sovedaban*$event->giave,0,',','.') .' VNĐ',
            'tickets' => $tickets
        ]);
    }
    public function viewer_statistical(){
        $user = $this->userService->getAll();
        $users = [];
        foreach($user as $key) {
            if ($key->quyentruycap == 1) {
                array_push($users,$key);
            }
        }
        return view('admin.event_statistical.viewer_statistical',[
            'title'=>'Danh sách khán giả',
            'users' => $users
        ]);
    }
    public function viewer_statistical_detail($user_id) {
        $user = $this->userService->find($user_id);
        $tickets = $this->ticketService->findticket_byuser($user_id);
        $amount = 0;
        foreach($tickets as $key) {
            $amount += $key->tongtien;
        }
        return view('admin.event_statistical.viewer_statistical_detail',[
            'title'=>'Danh sách vé khán giả: '.$user->hoten. '- Tổng tiền vé đã mua: '.number_format($amount,0,',','.').' VNĐ',
            'tickets'=>$tickets
        ]);
    }
}
