<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupTextMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_sub_bab',
        'judul_sub_bab',
        'gambar',
        'id_sub_materi',
    ];

    public function subMaterial()
    {
        return $this->belongsTo(SubMaterial::class);
    }
}
