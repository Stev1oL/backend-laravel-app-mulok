<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubChapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_sub_bab',
        'judul_sub_bab',
        'gambar',
        'id_bab',
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}
