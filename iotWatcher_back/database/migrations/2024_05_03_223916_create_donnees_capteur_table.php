<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('donnees_capteurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('capteur_id');
            $table->foreign('capteur_id')->references('id')->on('capteurs')->onDelete('cascade');
            $table->float('valeur');
            $table->timestamp('timestamp');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donnees_capteurs');
    }
};