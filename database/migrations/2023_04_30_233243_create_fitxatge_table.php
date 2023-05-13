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
        Schema::create('fitxatge', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jornada')->nullable();
            $table->unsignedBigInteger('id_empresa');
            $table->unsignedBigInteger('id_treballador');
            $table->dateTime('entrada')->nullable();
            $table->dateTime('pausa')->nullable();
            $table->unsignedInteger('num_pausas')->default(0);
            $table->dateTime('continuitat')->nullable();
            $table->unsignedInteger('num_continuitats')->default(0);
            $table->dateTime('sortida')->nullable();
            $table->date('data')->default(now());
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
        Schema::dropIfExists('fitxatge');
    }
};
