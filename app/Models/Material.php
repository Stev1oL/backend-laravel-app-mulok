<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_materi',
        'kategori_materi',
        'id_bab',
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'id_bab');
    }

    public function subMaterial()
    {
        return $this->hasMany(SubMaterial::class, 'id_materi');
    }
}
