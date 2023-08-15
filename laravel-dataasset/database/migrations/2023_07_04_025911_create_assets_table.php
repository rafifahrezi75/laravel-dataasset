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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('asset');
            $table->integer('idkategori');
            $table->string('merk');
            $table->integer('tahunbeli');
            $table->string('harga');
            $table->integer('umurekonomis');
            $table->integer('nilairesidu');
            $table->string('spek');
            $table->string('latitude');
            $table->string('longitude');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
