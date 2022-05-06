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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('nombre');
            $table->foreignId('marcas_id')->constrained('marcas');
            $table->string('placa');
            $table->string('motor');
            $table->bigInteger('airbag');
            $table->bigInteger('modelo');
            $table->bigInteger('kilometraje');
            $table->foreignId('combustibles_id')->constrained('combustibles');
            $table->foreignId('tipocaja_id')->constrained('tipocaja');
            $table->string('color');
            $table->foreignId('estadovehiculo_id')->constrained('estadovehiculo');  //se quita el plural y el guion bajo
            $table->foreignId('estadoaplicativo_id')->constrained('estadoaplicativo'); 
            $table->bigInteger('precio');
            $table->string('descripcion')->nullable();
            $table->string('foto')->nullable();
            //$table->foreignId('estado_aplicativo_id')->constrained('estado_aplicativo');
            
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
        Schema::dropIfExists('vehiculos');
    }
};
