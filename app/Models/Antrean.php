<?php

namespace App\Models;

use App\Models\Loket;
use App\Models\Kategori;
use App\Models\Pengguna;
use Illuminate\Support\Str;
use App\Models\AttachmentAntrean;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'slug',
    ];
    
    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function loket(){
        return $this->hasMany(Loket::class, 'antrean_id');
    }

    public function pengguna(){
        return $this->belongsTo(Pengguna::class, 'id_pembuat');
    }

    public function RiwayatAntrean(){
        return $this->hasMany(RiwayatAntrean::class, 'antrean_id');
    }

    public function attachmentAntrean(){
        return $this->hasMany(AttachmentAntrean::class, 'id_antrean');
    }
}
