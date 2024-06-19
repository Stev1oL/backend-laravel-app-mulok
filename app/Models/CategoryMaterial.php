<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kategori',
    ];

    public function subMaterial()
    {
        return $this->hasMany(SubMaterial::class, 'id_kategori');
    }

    public function imageMaterial()
    {
        return $this->hasMany(ImageMaterial::class, 'id_kategori');
    }

    public function textMaterial()
    {
        return $this->hasMany(TextMaterial::class, 'id_kategori');
    }
}
