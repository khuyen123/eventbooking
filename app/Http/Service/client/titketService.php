<?php 
namespace App\Http\Service\client;

use App\Models\checkseat;
use App\Models\titket;
use App\Repository\Eloquent\TitketRepository;
use App\Repository\Eloquent\UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class titketService {
    protected $titketRepository;
    public function __construct(TitketRepository $titketRepository)
    {
        $this->titketRepository = $titketRepository;
    }
    public function getAll(){
        return $this->titketRepository->getAll();
    }
    public function create($data){
        return $this->titketRepository->create($data);
    }
    public function search($titket_id){
        $titket = titket::query()
        ->where('id_ve','=',$titket_id)
        ->first();
        return $titket;
    }
    public function findticket_byEvent($event_id) {
        $tickets = titket::query()
        ->where('id_chitietsukien','=',$event_id)
        ->get();
        return $tickets;
    }
    public function findticket_byuser($user_id){
        $tickets = titket::query()
        ->where('id_nguoidung','=',$user_id)
        ->get();
        return $tickets;
    }
    public function find($titket_id){
        return $this->titketRepository->find($titket_id);
    }
    public function check_in($titket){
        DB::table('ve')
        ->where('id_ve',$titket->id_ve)
        ->limit(1)
        ->update(array('kiemtra'=>1));
        return true;
    }
    public function delete($ticket_id) {
        $result = DB::table('ve')
        ->where('id_ve','=',$ticket_id)
        ->delete();
        return $result;
    }
    public function delete_seat($data){
        $seat = checkseat::query()
        ->where('soGhe','=',$data->soGhe)
        ->where('id_chitietsukien','=',$data->id_chitietsukien)
        ->first();
        return checkseat::destroy($seat);

    }
    public function payment_success($titket){
        DB::table('ve')
        ->where('id_ve',$titket->id_ve)
        ->limit(1)
        ->update(array('thanhtoan'=>1));
        return true;
    }
}