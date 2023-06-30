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
        Schema::create('ve', function (Blueprint $table) {
            $table->string('id_ve',6);
            $table->primary('id_ve');
            $table->string('tinhtrang');
            $table->string('soghe')->nullable();
            $table->string('ten_nguoidat')->nullable();
            $table->string('sdt_nguoidat')->nullable();
            $table->string('email_nguoidat')->nullable();
            $table->integer('soCho')->nullable();
            $table->integer('tongtien')->nullable();
            $table->integer('thanhtoan');
            $table->integer('kiemtra');
            $table->unsignedBigInteger('id_nguoidung');
            $table->unsignedBigInteger('id_chitietsukien');
            $table->foreign('id_nguoidung')->references('id')->on('users')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('id_chitietsukien')->references('id')->on('chitietsukien')->onUpdate('restrict')->onDelete('cascade');
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
        Schema::dropIfExists('ve');
    }
};
