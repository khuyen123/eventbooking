<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->string('makichhoat')->nullable();
            $table->integer('trangthai')->nullable();
            $table->integer('kichhoat')->nullable();
            $table->string('hoten')->nullable();
            $table->date('ngaySinh')->nullable();      
            $table->string('sdt')->nullable();          
            $table->string('gioiTinh')->nullable();
            $table->string('diachi')->nullable();
            $table->string('anhdaidien',1000)->nullable();
            $table->string('token')->nullable();
            $table->unsignedBigInteger('id_xaphuong');
            $table->unsignedBigInteger('quyentruycap');
            $table->foreign('id_xaphuong')->references('id')->on('xaphuong');
            $table->foreign('quyentruycap')->references('id')->on('quyentruycap');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
