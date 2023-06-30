<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event_detail extends Model
{
    use HasFactory;

    protected $fillable=[
        'batdau',
        'ketthuc',
        'diachi',
        'khuvuc',
        'sovetoida',
        'sovedaban',
        'trangthai',
        'giave',
        'sdt_lienhe',
        'ten_lienhe',
        'email_lienhe',
        'dotuoichophep',
        'mota',
        'id_sukien',
        'id_xaphuong',
        'id_hinhthucve',
        'sohangghe',
        'soghemoihang'
        
    ];
    public function event(){
        return $this->hasOne(event::class,'id','id_sukien');
    }
    public function wards(){
        return $this->hasOne(wards::class,'id','id_xaphuong');
    }
    public function event_image(){
        return $this->hasMany(event_image::class,'id','id_chitietsukien');
    }
    public function singleImage(){
        return $this->hasMany(event_image::class,'id','id_chitietsukien')->select('hinhanh')->limit(1);
    }
    public function titkettype(){
        return $this->hasOne(titkettype::class,'id','id_hinhthucve');
    }
    protected $table= 'chitietsukien';
}
