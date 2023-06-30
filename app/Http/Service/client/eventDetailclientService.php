<?php 
namespace App\Http\Service\client;

use App\Models\comment;
use App\Models\event_detail;
use App\Models\event_image;
use App\Models\titket;
use App\Repository\Eloquent\EventDetailRepository;
use App\Repository\Eloquent\EventRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class eventDetailclientService {
    const LIMIT=30;
    protected $eventdetailrepository;
    public function __construct(EventDetailRepository $eventdetailrepository)
    {
        $this->eventdetailrepository = $eventdetailrepository;
    }
    public function getevent(){
        $sukien =  DB::table('chitietsukien')
        ->join('hinhanh','hinhanh.id_chitietsukien','=','chitietsukien.id')
        ->join('sukien','sukien.id','=','chitietsukien.id_sukien')
        ->join('xaphuong','xaphuong.id','=','chitietsukien.id_xaphuong')
        ->groupBy('chitietsukien.id')
        ->take(self::LIMIT)
        ->get(array(
            'chitietsukien.id as id_chitietsukien',
            'sukien.tenSukien',
            'chitietsukien.diachi',
            'hinhanh.noidung',
            'chitietsukien.giave',
            'chitietsukien.sovetoida',
            'chitietsukien.sovedaban',
            'chitietsukien.trangthai',
            'chitietsukien.mota',
            'chitietsukien.id_hinhthucve',
            'chitietsukien.dotuoichophep'
        ));
        return $sukien;
    }
    public function gettopevent(){
        $sukien =  DB::table('chitietsukien')
        ->join('hinhanh','hinhanh.id_chitietsukien','=','chitietsukien.id')
        ->join('sukien','sukien.id','=','chitietsukien.id_sukien')
        ->join('xaphuong','xaphuong.id','=','chitietsukien.id_xaphuong')
        ->where('chitietsukien.trangthai','=',1)
        ->groupBy('chitietsukien.id')
        ->orderByDesc('chitietsukien.sovedaban')
        ->limit(4)
        ->get(array(
            'chitietsukien.id as id_chitietsukien',
            'sukien.tenSukien',
            'chitietsukien.diachi',
            'hinhanh.noidung',
            'chitietsukien.giave',
            'chitietsukien.sovetoida',
            'chitietsukien.sovedaban',
            'chitietsukien.trangthai',
            'chitietsukien.mota',
            'chitietsukien.id_hinhthucve',
            'chitietsukien.dotuoichophep'
        ));
        return $sukien;
    }
    public function search_event($searchString){
        $sukien =  DB::table('chitietsukien')
        ->join('hinhanh','hinhanh.id_chitietsukien','=','chitietsukien.id')
        ->join('sukien','sukien.id','=','chitietsukien.id_sukien')
        ->join('xaphuong','xaphuong.id','=','chitietsukien.id_xaphuong')
        ->where('sukien.tenSukien','LIKE',"%{$searchString}%")
        ->groupBy('chitietsukien.id')
        ->take(self::LIMIT)
        ->get(array(
            'chitietsukien.id as id_chitietsukien',
            'sukien.tenSukien',
            'chitietsukien.diachi',
            'hinhanh.noidung',
            'chitietsukien.giave',
            'chitietsukien.sovetoida',
            'chitietsukien.id_hinhthucve',
            'chitietsukien.sovedaban',
            'chitietsukien.trangthai',
            'chitietsukien.mota',
            'chitietsukien.dotuoichophep'
        ));
        return $sukien;
    }
    public function geteventdetail($id){
        return $this->eventdetailrepository->find($id);
    }
    public function getimage($detail_id){
        $images =  event_image::query()
        ->where('id_chitietsukien','LIKE',$detail_id)
        ->get();
        return $images;
    }
    public function getOneimage($detail_id){
        $image =  event_image::query()
        ->where('id_chitietsukien','LIKE',$detail_id)
        ->first();
        return $image;
    }
    public function gettitket($detail_id){
        $titkets = titket::query()
        ->where('id_chitietsukien','LIKE',$detail_id)
        ->get();
        return $titkets;
    }
    public function getComment($detail_id){
        $comments = comment::query()
        ->where('id_chitietsukien','=',$detail_id)
        ->get();
        return $comments; 
    }
    public function create_comment($data){
        try {
            comment::create($data);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
        
    }
    public function delete_comment($comment_id){
       try {
            comment::destroy($comment_id);
            return true;
       } catch (\Throwable $th) {
        return false;
       }
    }
}