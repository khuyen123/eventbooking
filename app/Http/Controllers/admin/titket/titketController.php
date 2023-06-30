<?php

namespace App\Http\Controllers\admin\titket;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Event\titketsearchRequest;
use App\Http\Service\admin\eventDetailService;
use App\Http\Service\client\eventDetailclientService;
use App\Http\Service\client\titketService;
use App\Models\checkseat;
use App\Models\event_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use PDF;
class titketController extends Controller
{
    protected $titketService;
    protected $client_eventdetailService;
    protected $admineventDetail;
    public function __construct(titketService $titketService, eventDetailclientService $eventDetailclientService, eventDetailService $admineventDetail)
    {
        $this->client_eventdetailService = $eventDetailclientService;
        $this->titketService = $titketService;
        $this->admineventDetail = $admineventDetail;
    }
    public function index(){
        $events = event_detail::query()
        ->orderByDesc('sovedaban')
        ->get();
        return view('admin.titket.index',[
            'title'=>'Quản lý vé',
            'events'=>$events
        ]);
    }
    public function event_ticket($event_id){
        $event = $this->client_eventdetailService->geteventdetail($event_id);
        $tickets = $this->titketService->findticket_byEvent($event_id);
        return view('admin.titket.event_ticket',[
            'title'=>'Danh sách vé sự kiện: '.$event->event->tenSukien.$event->wards->district->province->tentinhthanh,
            'tickets'=>$tickets
        ]);
    }
    public function search(titketsearchRequest $request){
        $titket = $this->titketService->search($request->titket_id);
        if ($titket!=null){
            return view('admin.titket.detail',[
                'title'=>'Quản lý vé',
                'new_titket'=>$titket
            ]);
        } else{
            Session::flash('error','Không tìm thấy vé');
            return redirect()->back();
        }
    }
    public function delete($titket_id){
        $ticket = $this->titketService->search($titket_id);
        $event_id = $ticket->event_detail->id;
        $seats = [];
        $seats = explode(",",$ticket->soGhe);
        $event = $this->client_eventdetailService->geteventdetail($event_id);
        $data['sovedaban'] = $event->sovedaban - $ticket->soCho;
        foreach($seats as $seat){
             $find = checkseat::query()
             ->where('soGhe','=',$seat)
             ->where('id_chitietsukien','=',$ticket->id_chitietsukien)
             ->get();
             checkseat::destroy($find);
        }
        if ($this->titketService->delete($titket_id)) {
            $this->admineventDetail->update($event,$data);
            Session::flash('success','Huỷ vé thành công!');
            return response()->json([
                'url'=>'/admin/titket/event_ticket/'.$event_id
            ]);
        }
    }
    public function ticket_detail($ticket_id){
        $ticket = $this->titketService->search($ticket_id);
        return view('admin.titket.detail',[
            'title'=>'Quản lý vé',
                'new_titket'=>$ticket
        ]);
    }
    public function checkin($titket_id,Request $request){
        $titket = $this->titketService->search($titket_id);
        return $this->titketService->check_in($titket);
    }
    public function export_titket($titket_id){
        $titket = $this->titketService->search($titket_id);
        $image = $this->client_eventdetailService->getOneimage($titket->id_chitietsukien);
        $data = [
            'title' => 'Chi Tiết Vé',
            'new_ticket' => $titket,
            'image'=> $image
        ]; 
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadview('client.titket.titket_pdf',$data);
        $file_name = 'VeSuKien'.$titket->id_ve.'.pdf';
        return $pdf->download($file_name);
    }
}
