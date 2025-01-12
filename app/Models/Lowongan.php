<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    protected $table = 'lowongan';

    protected $fillable = [
        'perusahaan_id',
        'nama_lowongan',
        'alamat',
        'requirement',
        'benefit',
        'modal_usaha',
        'jumlah_lowongan',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'status',
    ];

    public function requests()
    {
        return $this->hasMany(RequestBerhenti::class, 'lowongan_id');
    }
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id');
    }

    public function bergabungPerusahaan()
    {
        return $this->hasMany(BergabungPerusahaan::class, 'lowongan_id');
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'lowongan_id');
    }

    public function tags()
    {
        return $this->belongsToMany(TagSpesifikasi::class, 'tagspesifikasi_lowongan', 'lowongan_id', 'tag_id')
            ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
