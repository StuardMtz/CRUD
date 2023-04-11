<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    //Run the migrations.
    public function up(): void{
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('Carnet', 12)->unique();
            $table->string('Nombre', 150);
            $table->date('Fecha_Nacimiento');
            $table->string('Telefono', 20);
            $table->string('Email', 50)->nullable();
            //foring key 
            $table->unsignedBigInteger('nivel_id');
            $table->timestamps();
            //Coneccion tablas
            $table->foreign('nivel_id')->references('id')->on('nivels');
        });
    }
    //Reverse the migrations
    public function down(): void{
        Schema::dropIfExists('alumnos');
    }
};
