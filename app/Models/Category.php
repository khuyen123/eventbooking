<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'tenDanhmuc',
        'mota'
    ];
    public function event(){
        return $this->hasMany(event::class,'id','id_danhmucsukien');
    }
    protected $table= 'danhmucsukien';
}
