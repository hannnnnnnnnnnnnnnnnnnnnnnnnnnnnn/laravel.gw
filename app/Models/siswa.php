<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    // Setel nama tabel untuk model ini
    protected $table = 'siswa';

    // Nonaktifkan penanda waktu (timestamps) untuk model ini
    public $timestamps = false;

    // Tentukan kolom yang dapat diisi untuk mass assignment
    protected $fillable = ['nama', 'nis', 'jenis_kelamin', 'jurusan_id'];

    // Tentukan hubungan dengan model Jurusan
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
