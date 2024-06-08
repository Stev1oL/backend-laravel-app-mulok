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
        Schema::create('sub_chapters', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_sub_bab');
            $table->string('judul_sub_bab');
            $table->string('gambar');
            $table->unsignedBigInteger('id_bab');
            $table->timestamps();

            $table->foreign('id_bab')->references('id')->on('chapters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_chapters');
    }
};
