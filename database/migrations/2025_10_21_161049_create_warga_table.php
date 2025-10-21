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
        Schema::create('warga', function (Blueprint $table) {
            $table->id('warga_id'); // Primary Key
            $table->string('nik', 16)->unique(); // NIK (Nomor Induk Kependudukan)
            $table->string('nama_lengkap', 100);
            $table->string('nama_panggilan', 50)->nullable();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu', 'Lainnya']);
            $table->enum('status_perkawinan', ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']);
            $table->enum('pendidikan_terakhir', ['Tidak/Belum Sekolah', 'Tidak Tamat SD/Sederajat', 'Tamat SD/Sederajat', 'SLTP/Sederajat', 'SLTA/Sederajat', 'Diploma I/II', 'Akademi/Diploma III/S.Muda', 'Diploma IV/Strata I', 'Strata II', 'Strata III']);
            $table->string('pekerjaan', 100)->nullable();
            $table->string('alamat', 200);
            $table->string('rt', 3);
            $table->string('rw', 3);
            $table->string('kelurahan', 50);
            $table->string('kecamatan', 50);
            $table->string('kabupaten_kota', 50);
            $table->string('provinsi', 50);
            $table->string('kode_pos', 5)->nullable();
            $table->string('no_telepon', 15)->nullable();
            $table->string('email', 100)->nullable();
            $table->enum('status_kependudukan', ['Warga Tetap', 'Warga Sementara', 'Pendatang', 'Pindah Keluar']);
            $table->date('tanggal_masuk')->nullable(); // Tanggal masuk ke desa
            $table->date('tanggal_keluar')->nullable(); // Tanggal keluar dari desa
            $table->string('alasan_keluar', 200)->nullable();
            $table->enum('golongan_darah', ['A', 'B', 'AB', 'O'])->nullable();
            $table->string('kewarganegaraan', 50)->default('Indonesia');
            $table->string('nama_ayah', 100)->nullable();
            $table->string('nama_ibu', 100)->nullable();
            $table->string('foto', 200)->nullable(); // Path foto
            $table->text('catatan')->nullable(); // Catatan khusus
            $table->timestamps();

            // Index untuk performa
            $table->index(['nik']);
            $table->index(['nama_lengkap']);
            $table->index(['rt', 'rw']);
            $table->index(['status_kependudukan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warga');
    }
};