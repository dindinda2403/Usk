<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // <-- Wajib ditambahkan agar user_id bisa disimpan
        'skema_id',
        'nm_peserta',
        'jk',
        'no_hp',
        'alamat',
    ];

    // Relasi ke Model User (Tiap peserta terhubung ke 1 akun User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi Many-to-One: Setiap peserta terhubung ke satu skema
    public function skema()
    {
        return $this->belongsTo(Skema::class);
    }
}
