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
        Schema::create('chitietsukien', function (Blueprint $table) {
            $table->id();
            $table->dateTime('batdau');
            $table->dateTime('ketthuc');
            $table->string('diachi');
            $table->string('khuvuc');
            $table->integer('sovetoida');
            $table->integer('sovedaban');
            $table->integer('trangthai');
            $table->bigInteger('giave');
            $table->string('sdt_lienhe')->nullable();
            $table->string('email_lienhe')->nullable();
            $table->string('ten_lienhe')->nullable();
            $table->integer('dotuoichophep');
            $table->integer('sohangghe')->nullable();
            $table->integer('soghemoihang')->nullable();
            $table->string('mota',10000)->nullable();
            $table->unsignedBigInteger('id_sukien');
            $table->unsignedBigInteger('id_xaphuong');
            $table->unsignedBigInteger('id_hinhthucve');
            $table->foreign('id_xaphuong')->references('id')->on('xaphuong');
            $table->foreign('id_hinhthucve')->references('id')->on('hinhthucve');
            $table->foreign('id_sukien')->references('id')->on('sukien')->onUpdate('restrict')->onDelete('cascade');
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
        Schema::dropIfExists('chitietsukien');
    }
};
