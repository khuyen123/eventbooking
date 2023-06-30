<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    protected $fillable=[
        'noidung',
        'id_chitietsukien',
        'id_nguoidung',
        'sosao'
    ];
    public function event_detail(){
        return $this->hasOne(event_detail::class,'id','id_sukien');
    }
    public function user(){
        return $this->hasOne(user::class,'id','id_nguoidung');
    }
    protected $table= 'binhluan';
}
