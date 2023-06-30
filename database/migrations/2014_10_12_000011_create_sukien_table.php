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
        Schema::create('sukien', function (Blueprint $table) {
            $table->id();
            $table->string('tenSukien');
            $table->string('motaSuKien',10000)->nullable();
            $table->unsignedBigInteger('id_danhmucsukien');
            $table->foreign('id_danhmucsukien')->references('id')->on('danhmucsukien')->onUpdate('restrict')->onDelete('cascade');
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
        Schema::dropIfExists('sukien');
    }
};
