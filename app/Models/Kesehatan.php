<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kesehatan extends Model
{
    use HasFactory;
    protected $fillable = ['npm', 'riwayat penyakit', 'golongan darah'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'npm');
    }
}