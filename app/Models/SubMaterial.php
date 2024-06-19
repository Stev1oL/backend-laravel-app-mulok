<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_sub_materi',
        'judul_sub_materi',
        'id_materi',
        'id_kategori',
    ];

    public function material()
    {
        return $this->belongsTo(Material::class, 'id_materi');
    }

    public function category()
    {
        return $this->belongsTo(CategoryMaterial::class, 'id_kategori');
    }

    public function textMaterial()
    {
        return $this->hasMany(TextMaterial::class, 'id_sub_materi');
    }

    public function groupTextMaterial()
    {
        return $this->hasMany(GroupTextMaterial::class, 'id_sub_materi');
    }

    public function imageMaterial()
    {
        return $this->hasMany(ImageMaterial::class, 'id_sub_materi');
    }
}
