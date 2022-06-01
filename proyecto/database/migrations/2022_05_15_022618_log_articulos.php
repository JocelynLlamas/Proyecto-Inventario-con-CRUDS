<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LogArticulos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logarticulos', function (Blueprint $table) {
            $table->id();
            $table->integer('idarticulo')->nullable();
            $table->string('nombreO', 100)->nullable();
            $table->integer('piezasO')->nullable();
            $table->double('precioO')->nullable();
            $table->string('categoria_idO', 100)->nullable();
            $table->string('descripcionO', 200)->nullable();
            $table->string('image_pathO')->nullable();
            $table->string('nombreN', 100)->nullable();
            $table->integer('piezasN')->nullable();
            $table->double('precioN')->nullable();
            $table->string('categoria_idN', 100)->nullable();
            $table->string('descripcionN', 200)->nullable();
            $table->string('image_pathN')->nullable();
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
        //
    }
}
