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
        Schema::create('xaphuong', function (Blueprint $table) {
            $table->id();
            $table->string('tenxaphuong');
            $table->timestamps();
            $table->unsignedBigInteger('id_quanhuyen');
            $table->foreign('id_quanhuyen')->references('id')->on('quanhuyen')->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xaphuong');
    }
};
