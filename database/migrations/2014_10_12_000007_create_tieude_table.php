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
        Schema::create('thongtintrangchu', function (Blueprint $table) {
            $table->id();
            $table->string('tieude_vechungtoi')->nullable();
            $table->string('noidung_vechungtoi')->nullable();
            $table->string('email_trangchu')->nullable();
            $table->string('sdt_trangchu')->nullable();
            $table->string('diachi_trangchu')->nullable();
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
        Schema::dropIfExists('thongtintrangchu');
    }
};
