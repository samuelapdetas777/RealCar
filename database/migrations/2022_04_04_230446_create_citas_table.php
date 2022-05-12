<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('asunto');
            $table->foreignId('idvehiculo')->constrained('vehiculos')->nullable();
            $table->foreignId('idvendedor')->constrained('users')->nullable();
            $table->foreignId('idproveedor')->constrained('users')->nullable();
            $table->foreignId('idcliente')->constrained('users')->nullable();
            $table->date('fecha');
            $table->time('hora');
            $table->foreignId('sedes_id')->constrained('sedes');
            $table->string('comentario')->nullable();

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
        Schema::dropIfExists('citas');
    }
}
