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
        'id_bab',
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'id_bab');
    }
}
