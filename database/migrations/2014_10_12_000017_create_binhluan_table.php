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
        Schema::create('binhluan', function (Blueprint $table) {
            $table->id();
            $table->string('noidung');
            $table->integer('sosao')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('id_chitietsukien');
            $table->unsignedBigInteger('id_nguoidung');
            $table->foreign('id_chitietsukien')->references('id')->on('chitietsukien')->onDelete('cascade');
            $table->foreign('id_nguoidung')->references('id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('binhluan');
    }
};
