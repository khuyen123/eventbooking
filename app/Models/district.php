<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class district extends Model
{
    use HasFactory;

    protected $fillable=[
        'tenquanhuyen',
        'id_tinhthanh'
        
    ];
    public function wards(){
        return $this->hasMany(wards::class,'id','id_xaphuong');
    }
    public function province(){
        return $this->hasOne(province::class,'id','id_tinhthanh');
    }
    protected $table= 'quanhuyen';
}
