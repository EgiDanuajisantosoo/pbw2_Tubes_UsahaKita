<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BergabungPerusahaan extends Model
{

    protected $table = 'bergabung_perusahaan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'lowongan_id',
        'modal_usaha',
        'alasan',
        'status_permintaan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function perusahaan()
    // {
    //     return $this->belongsTo(Perusahaan::class, 'perusahaan_id');
    // }

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'lowongan_id');
    }
}
