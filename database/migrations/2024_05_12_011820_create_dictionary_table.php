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
        Schema::create('dictionaries', function (Blueprint $table) {
            $table->id();
            $table->string('bahasa_dayak');
            $table->string('terjemahan');
            $table->string('audio');
            $table->unsignedBigInteger('id_sub_bab');
            $table->timestamps();

            $table->foreign('id_sub_bab')->references('id')->on('sub_chapters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dictionaries');
    }
};
