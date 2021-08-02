<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrean extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'antrean';
    
    protected $fillable = [
        'nama_antrean',
        'id_pembuat',
        'id_kategori',
        'deskripsi',
        'provinsi',
        'alamat',
        'nomor_telepon',
        'waktu_buka',
        'waktu_tutup',
        'file_path_img',
    ];
}
