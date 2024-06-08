<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_materi',
        'id_sub_bab',
    ];

    public function subChapter()
    {
        return $this->belongsTo(SubChapter::class);
    }
}
