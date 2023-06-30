<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkseat extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_chitietsukien',
        'soGhe',
        'id_nguoidung'
    ];
    public function event_detail(){
        return $this->hasOne(event_detail::class,'id_chitietsukien','id');
    }
    public function user(){
        return $this->hasOne(event_detail::class,'id_nguoidung','id');
    }
    protected $table= 'checkghe';
}
