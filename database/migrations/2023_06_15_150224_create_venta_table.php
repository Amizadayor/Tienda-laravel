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
        Schema::create('venta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_detalles_pedido')->unsigned();
            $table->integer('id_envio')->unsigned();

            $table->foreign('id_detalles_pedido')->references('id')->on('detalles_pedido')->onDelete('cascade');
            $table->foreign('id_envio')->references('id')->on('envio')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta');
    }
};
