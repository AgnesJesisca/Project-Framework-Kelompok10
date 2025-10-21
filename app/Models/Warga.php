<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $table = 'warga';
    protected $primaryKey = 'warga_id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'nik',
        'nama_lengkap',
        'nama_panggilan',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'status_perkawinan',
        'pendidikan_terakhir',
        'pekerjaan',
        'alamat',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'kabupaten_kota',
        'provinsi',
        'kode_pos',
        'no_telepon',
        'email',
        'status_kependudukan',
        'tanggal_masuk',
        'tanggal_keluar',
        'alasan_keluar',
        'golongan_darah',
        'kewarganegaraan',
        'nama_ayah',
        'nama_ibu',
        'foto',
        'catatan',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_masuk' => 'date',
        'tanggal_keluar' => 'date',
        'nik' => 'string',
    ];

    // Relasi dengan anggota keluarga
    public function anggotaKeluarga()
    {
        return $this->hasMany(AnggotaKeluarga::class, 'warga_id', 'warga_id');
    }

    // Accessor untuk format nama
    public function getNamaLengkapAttribute($value)
    {
        return ucwords(strtolower($value));
    }

    // Accessor untuk format alamat lengkap
    public function getAlamatLengkapAttribute()
    {
        return "{$this->alamat}, RT {$this->rt}/RW {$this->rw}, {$this->kelurahan}, {$this->kecamatan}, {$this->kabupaten_kota}, {$this->provinsi}";
    }

    // Accessor untuk umur
    public function getUmurAttribute()
    {
        return $this->tanggal_lahir ? $this->tanggal_lahir->age : null;
    }

    // Scope untuk warga aktif
    public function scopeAktif($query)
    {
        return $query->where('status_kependudukan', 'Warga Tetap');
    }

    // Scope untuk pencarian
    public function scopeSearch($query, $search)
    {
        return $query->where('nama_lengkap', 'like', "%{$search}%")
                    ->orWhere('nik', 'like', "%{$search}%")
                    ->orWhere('alamat', 'like', "%{$search}%");
    }
}