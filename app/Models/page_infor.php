<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class page_infor extends Model
{
    use HasFactory;

    protected $fillable=[
        'tieude_vechungtoi',
        'email_trangchu',
        'noidung_vechungtoi',
        'sdt_trangchu',
        'diachi_trangchu',
        'tieude_trangchu',
        'noidung_trangchu',
        'trangthai'
        
    ];
    protected $table= 'thongtintrangchu';
}
