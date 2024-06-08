<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    use HasFactory;

    protected $fillable = [
        'bahasa_dayak',
        'terjemahan',
        'audio',
        'id_sub_bab',
    ];

    public function subChapter()
    {
        return $this->belongsTo(SubChapter::class);
    }
}
