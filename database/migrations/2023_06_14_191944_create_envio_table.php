<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('envio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedido_id')->unsigned();
            $table->enum('metodo_envio', ['estandar', 'express', 'recogida'])->default('estandar');
            $table->string('direccion_envio', 255);
            $table->string('metodo_pago', 50)->default('tarjeta');

            $table->foreign('pedido_id')->references('id')->on('pedido')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('envio');
    }
};
