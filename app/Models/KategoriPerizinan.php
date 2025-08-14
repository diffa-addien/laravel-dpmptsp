<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPerizinan extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara eksplisit jika diperlukan (opsional, karena Laravel sudah pintar)
    protected $table = 'kategori_perizinans';

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];
}