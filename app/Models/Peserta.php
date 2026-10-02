<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $fillable = [
        'skema_id',
        'nm_peserta',
        'jk',
        'no_hp',
        'alamat',
    ];

    // Relasi Many-to-One: Setiap peserta terhubung ke satu skema
    public function skema()
    {
        return $this->belongsTo(Skema::class);
    }
}
