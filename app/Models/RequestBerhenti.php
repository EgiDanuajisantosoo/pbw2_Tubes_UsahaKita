<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestBerhenti extends Model
{
    protected $table = 'request';
    protected $fillable = [
        'bisnisman_id',
        'partner_id',
        'lowongan_id',
        'Persetujuan_Bisnisman',
        'Persetujuan_Partner'
    ];

    // Relasi ke tabel User sebagai Bisnisman
    public function bisnisman()
    {
        return $this->belongsTo(User::class, 'bisnisman_id');
    }

    // Relasi ke tabel User sebagai Partner
    public function partner()
    {
        return $this->belongsTo(User::class, 'partner_id');
    }

    // Relasi ke tabel Lowongan
    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'lowongan_id');
    }
}
