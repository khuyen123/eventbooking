<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    use HasFactory;
    protected $fillable=[
        'id_tinhthanh',
        'tentinhthanh'
    ];
    public function district(){
        return $this->hasMany(district::class,'id','id_quanhuyen');
    }
    protected $table= 'tinhthanh';
}
