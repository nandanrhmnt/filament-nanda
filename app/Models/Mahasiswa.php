<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = ['npm', 'nama', 'jenis kelamin', 'email', 'alamat', 'tanggal lahir', 'agama', 'nomor telepon'];

    public function kesehatan()
    {
        return $this->hasOne(Kesehatan::class, 'npm');
    }
    public function keluarga()
    {
        return $this->hasMany(Keluarga::class, 'npm');
    }
    public function prestasiakademik()
    {
        return $this->hasMany(PrestasiAkademik::class, 'npm');
    }
    public function prestasinonakademik()
    {
        return $this->hasMany(PrestasiNonAkademik::class, 'npm');
    }
}
