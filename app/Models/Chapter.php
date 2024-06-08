<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_bab',
        'judul_bab',
        'id_semester',
    ];

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'id_semester');
    }

    public function subChapters()
    {
        return $this->hasMany(SubChapter::class, 'id');
    }
}
