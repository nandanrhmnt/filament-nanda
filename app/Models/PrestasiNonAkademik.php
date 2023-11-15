<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestasiNonAkademik extends Model
{
    use HasFactory;
    protected $fillable = ['npm', 'nama prestasi', 'tingkat', 'juara', 'tahun'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id');
    }
}
