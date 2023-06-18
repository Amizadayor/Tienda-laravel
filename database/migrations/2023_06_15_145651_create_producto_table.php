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
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
            $table->unsignedInteger('categoria_id')->nullable();
            $table->unsignedInteger('pedido_id')->nullable();
            $table->unsignedInteger('marca_id')->nullable();
            $table->unsignedInteger('cantidad_disponible')->nullable();
            $table->decimal('precio', 10, 2)->nullable();
            $table->string('descripcion', 255)->nullable();
            $table->string('imagen', 255)->nullable();
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categoria')->onDelete('set null');
            $table->foreign('marca_id')->references('id')->on('marca')->onDelete('set null');
            $table->foreign('pedido_id')->references('id')->on('pedido')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
