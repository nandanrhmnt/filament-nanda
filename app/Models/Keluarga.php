<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keluarga extends Model
{
    use HasFactory;
    protected $fillable = ['npm', 'nama anggota keluarga', 'hubungan', 'nomor telepon'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id');
    }
}