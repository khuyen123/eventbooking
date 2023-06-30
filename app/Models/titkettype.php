<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class titkettype extends Model
{
    use HasFactory;

    protected $fillable=[
        'tenhinhthuc'
        
    ];
    public function eventdetail(){
        return $this->hasMany(event_detail::class,'id','id_hinhthucve');
    }
    protected $table= 'hinhthucve';
}
