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
        Schema::create('detalles_devolucion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('devolucion_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->integer('cantidad_devuelta');

            $table->foreign('devolucion_id')->references('id')->on('devolucion')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('producto')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_devolucion');
    }
};
