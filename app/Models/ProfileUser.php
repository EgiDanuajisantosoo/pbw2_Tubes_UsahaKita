<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileUser extends Model
{
    protected $table = 'profile_user';
    protected $fillable = [
        'user_id',
        'foto_profile',
        'slogan',
        'banner',
        'no_telp',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'keahlian',
        'pengalaman',
        'pendidikan',
        'sertifikasi',
        'jenis_kelamin'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
