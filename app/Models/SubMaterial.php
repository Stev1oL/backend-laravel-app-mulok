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
}
