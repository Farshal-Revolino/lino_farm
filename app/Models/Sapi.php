<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sapi extends Model
{
    use HasFactory;

    protected $table = 'sapi';
    protected $fillable = ['nama', 'jenis', 'umur', 'berat', 'harga', 'gambar'];
}

