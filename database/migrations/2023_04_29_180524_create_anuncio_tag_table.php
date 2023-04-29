<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('anuncio_tag', function (Blueprint $table) {
            
            $table->unsignedBigInteger('anuncio_id');
            $table->unsignedBigInteger('tag_id');
            $table->primary('anuncio_id','tag_id');
            $table->timestamps();
            $table->foreign('anuncio_id')->references('id')->on('anuncios')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }
    
};
