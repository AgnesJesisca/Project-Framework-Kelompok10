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
        Schema::create('keluarga_kk', function (Blueprint $table) {
        $table->increments('kk_id'); //primary key
        $table->string('kk_nomor', 100)->unique; 
        $table->unsignedBigInteger('kepala_keluarga_warga_id')->nullable(); //fk belum aktif
        $table->string('alamat', 120)->nullable();
        $table->string('rt', 5)->nullable();
        $table->string('rw', 120)->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keluarga_kk');
    }
};
