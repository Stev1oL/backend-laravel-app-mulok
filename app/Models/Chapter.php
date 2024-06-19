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

    public function materials()
    {
        return $this->hasMany(Material::class, 'id_bab');
    }

    public function dictionary()
    {
        return $this->hasMany(Dictionary::class, 'id_bab');
    }
}
