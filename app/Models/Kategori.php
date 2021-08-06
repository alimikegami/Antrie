<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    
    protected $fillable = [
        'nama_kategori',
        'slug',
        'img_file_path',
    ];

    public function antrean(){
        return $this->hasMany(Antrean::class, 'id_kategori');
    }
}
