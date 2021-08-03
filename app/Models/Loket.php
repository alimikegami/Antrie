<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loket extends Model
{
    use HasFactory;

    protected $table = 'loket';
    
    protected $fillable = [
        'nama_loket',
        'id_antrean',
        'jumlah_pengantre_maks',
        'waktu_buka',
        'waktu_tutup',
        'status',
        'estimasi_waktu_tunggu',
    ];

    public $timestamps = false;
}
