<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\checkseat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class seatController extends Controller
{
    public function check_seat(Request $request){
        $seats = checkseat::all();
        $check = true;
        foreach($seats as $seat){
            if ($seat->soGhe == $request->soGhe && $seat->id_chitietsukien == $request->id_chitietsukien){
                $check = false;
                break;
            }
        }
        if ($check) {
            checkseat::create($request->all());
            return response()->json([
                'message'=> 'success'
            ]);
        } 
        return response()->json([
            'message'=>'error'
        ]);
    }
    public function delete(Request $request){
        $seat = checkseat::query()
        ->where('soGhe','=',$request->soGhe)
        ->where('id_nguoidung','=',$request->id_nguoidung)
        ->where('id_chitietsukien','=',$request->id_chitietsukien)
        ->first();
     
        $result = checkseat::destroy($seat->id);
        if ($result){
            echo "Thanh cong";
        } else {echo "Ngu";}
    }
}
