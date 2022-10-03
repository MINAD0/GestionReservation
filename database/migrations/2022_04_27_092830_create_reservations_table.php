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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('filier_id');
            $table->integer('groupe');
            $table->unsignedBigInteger('salle_id');
            $table->date('date');
            $table->unsignedBigInteger('consultant_id');
            $table->string('type');
            $table->foreign('filier_id')->references('id')->on('filiers');
            $table->foreign('salle_id')->references('id')->on('salles');
            $table->foreign('consultant_id')->references('id')->on('consultants');
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
        Schema::dropIfExists('reservations');
    }
};
