<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = ['npm', 'nama', 'pas foto', 'jenis kelamin', 'email', 'alamat', 'tanggal lahir', 'agama', 'nomor telepon'];

    public function kesehatan()
    {
        return $this->hasOne(Kesehatan::class, 'id');
    }
    public function keluarga()
    {
        return $this->hasMany(Keluarga::class, 'id');
    }
    public function prestasiakademik()
    {
        return $this->hasMany(PrestasiAkademik::class, 'id');
    }
    public function prestasinonakademik()
    {
        return $this->hasMany(PrestasiNonAkademik::class, 'id');
    }
}
