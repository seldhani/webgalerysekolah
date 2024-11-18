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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->foreignid('kategori_id')->constrained('kategori');
            $table->text('isi');
            $table->foreignid('petugas_id')->constrained('petugas');
            $table->string('status');
            $table->timestamps();
            $table->string('map_link')->default(''); 
            $table->string('social_link')->default(''); // Kolom yang boleh kosong

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
