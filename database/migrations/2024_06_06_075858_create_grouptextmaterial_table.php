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
        Schema::create('group_text_materials', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_sub_bab');
            $table->string('judul_sub_bab');
            $table->string('gambar')->nullable();
            $table->unsignedBigInteger('id_sub_materi');
            $table->timestamps();

            $table->foreign('id_sub_materi')->references('id')->on('sub_materials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_text_material');
    }
};
