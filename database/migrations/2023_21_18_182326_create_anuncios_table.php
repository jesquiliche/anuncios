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
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->unique();
            $table->text('description')->nullable();
            $table->unsignedBigInteger("subcategoria_id");
            $table->foreign("subcategoria_id")->references("id")->on("subcategorias");
            $table->unsignedBigInteger("estado_id");
            $table->foreign("estado_id")->references("id")->on("estados");
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
        Schema::dropIfExists('anuncios');
    }
};
