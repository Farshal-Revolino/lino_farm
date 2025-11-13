<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sapi extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara eksplisit (bagus)
    protected $table = 'sapi';

    // Daftar kolom yang diizinkan untuk diisi (Mass Assignment)
    protected $fillable = [
        'nama', 
        'jenis', 
        'umur', 
        'berat', 
        'harga', 
        'gambar',
        'sapistock' // <-- WAJIB: Untuk status Ready/Terjual
    ];
}