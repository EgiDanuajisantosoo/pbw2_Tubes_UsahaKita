<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $table = 'perusahaan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'pemilik_perusahaan',
        'email_perusahaan',
        'nama_perusahaan',
        'no_telp',
        'foto_ktp',
        'foto_perusahaan',
        'deskripsi',
        'website_perusahaan',
        'kategori',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'alamat_lengkap',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kategori_bisnis()
    {
        return $this->belongsTo(KategoriBisnis::class, 'kategori', 'id_kategori');
    }

    public function lowongan()
    {
        return $this->hasMany(Lowongan::class, 'perusahaan_id');
    }

    // public function bergabungPerusahaan()
    // {
    //     return $this->hasMany(BergabungPerusahaan::class, 'perusahaan_id');
    // }
}
