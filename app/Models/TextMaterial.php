<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'materi',
        'terjemahan',
        'audio',
        'id_sub_materi',
        'id_kategori',
    ];

    public function subMaterial()
    {
        return $this->belongsTo(SubMaterial::class, 'id_sub_materi');
    }

    public function category()
    {
        return $this->belongsTo(CategoryMaterial::class, 'id_kategori');
    }
}
