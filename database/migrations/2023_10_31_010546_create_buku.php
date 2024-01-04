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
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('kode_buku', 10)->unique();
            $table->string('judul_buku', 200)->nullable();
            $table->string('jenis_buku', 200)->nullable();
            $table->string('pengarang', 200)->nullable();
            $table->integer('tahun_terbit')->nullable();
            $table->tinyInteger('status_buku')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
