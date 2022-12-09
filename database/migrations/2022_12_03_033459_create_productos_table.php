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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_pr');
            $table->string('foto');
            $table->integer('stock');
            $table->text('desc_pr')->nullable();
            $table->unsignedBigInteger('medida_id')->nullable();
            $table->unsignedBigInteger('categoria_id')->nullable();

            $table->foreign('medida_id')->references('id')->on('medidas')->onDelete('set null');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('set null');
           
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
        Schema::dropIfExists('productos');
    }
};
