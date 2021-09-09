<?php

namespace App\Models;

use App\Models\Antrean;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttachmentAntrean extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'attachment_antrean';
    
    protected $fillable = [
        'file_path_attachment',
        'id_antrean',
    ];

    public function antrean(){
        return $this->belongsTo(Antrean::class, 'id_antrean');
    }
}
