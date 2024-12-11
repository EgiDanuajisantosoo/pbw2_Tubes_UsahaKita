<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriBisnis extends Model
{
    protected $table = 'kategori_bisnis';
    protected $primaryKey = 'id_kategori';
    protected $fillable = [
        'nama_kategori',
    ];

    public function perusahaan()
    {
        return $this->hasMany(Perusahaan::class, 'kategori', 'id_kategori');
    }
}
