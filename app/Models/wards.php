<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wards extends Model
{
    use HasFactory;

    protected $fillable=[
        'tenxaphuong',
        'id_quanhuyen'
        
    ];
    public function event_detail(){
        return $this->hasMany(event_detail::class,'id','id_xaphuong');
    }
    public function district(){
        return $this->hasOne(district::class,'id','id_quanhuyen');
    }
    public function user(){
        return $this->hasMany(user::class,'id','id_xaphuong');
    }
    protected $table= 'xaphuong';
}
