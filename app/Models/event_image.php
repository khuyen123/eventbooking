<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event_image extends Model
{
    use HasFactory;

    protected $fillable=[
        'noidung',
        'mota',
        'id_chitietsukien'
        
    ];
    public function event_detail(){
        return $this->hasOne(event_detail::class,'id','id_chitietsukien');
    }
    protected $table= 'hinhanh';
}
