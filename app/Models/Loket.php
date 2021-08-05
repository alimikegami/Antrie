<?php

namespace App\Models;

use App\Models\Antrean;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Loket extends Model
{
    use HasFactory;

    protected $table = 'loket';
    
    protected $fillable = [
        'nama_loket',
        'antrean_id',
        'jumlah_pengantre_maks',
        'waktu_buka',
        'waktu_tutup',
        'status',
        'estimasi_waktu_tunggu',
        'batch',
        'slug',
    ];

    public function antrean(){
        return $this->belongsTo(Antrean::class);
    }
}
