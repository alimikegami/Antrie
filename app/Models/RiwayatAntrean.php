<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatAntrean extends Model
{
    use HasFactory;

    protected $table = 'riwayat_antrean';
    
    protected $fillable = [
        'pengguna_id',
        'antrean_id',
        'loket_id',
        'batch',
        'nomor_antrean',
        'status',
    ];

    public function antrean(){
        return $this->belongsTo(Antrean::class, 'antrean_id');
    }

    public function pengguna(){
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }

    public function loket(){
        return $this->belongsTo(Loket::class, 'loket_id');
    }
}
