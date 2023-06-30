<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hoten',
        'email',
        'password',
        'username',
        'makichhoat',
        'trangthai',
        'kichhoat',
        'ngaySinh',
        'sdt',
        'gioiTinh',
        'diachi',
        'quyentruycap',
        'id_xaphuong',
        'token',
        'anhdaidien'
    ];
    public function wards(){
        return $this->hasOne(wards::class,'id','id_xaphuong');
    }
    public function roles(){
        return $this->hasOne(roles::class,'id','quyentruycap');
    }
    public function ticket(){
        return $this->hasMany(titket::class,'id_nguoidung','id');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
