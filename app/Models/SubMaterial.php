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
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function textMaterial()
    {
        return $this->hasMany(TextMaterial::class, 'id');
    }

    public function groupTextMaterial()
    {
        return $this->hasMany(GroupTextMaterial::class, 'id');
    }

    public function imageMaterial()
    {
        return $this->hasMany(ImageMaterial::class, 'id');
    }
}
