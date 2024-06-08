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
        Schema::create('image_materials', function (Blueprint $table) {
            $table->id();
            $table->text('materi');
            $table->unsignedBigInteger('id_sub_materi');
            $table->unsignedBigInteger('id_kategori');
            $table->timestamps();

            $table->foreign('id_sub_materi')->references('id')->on('sub_materials')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id')->on('category_materials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_materials');
    }
};
