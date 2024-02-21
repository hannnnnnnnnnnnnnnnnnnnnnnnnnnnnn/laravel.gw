<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    // Tentukan kolom yang dapat diisi untuk mass assignment
    protected $fillable = ['nama_jurusan', 'singkatan'];

    // Setel nama tabel untuk model ini
    protected $table = 'jurusan';

    // Nonaktifkan penanda waktu (timestamps) untuk model ini
    public $timestamps = false;
}
