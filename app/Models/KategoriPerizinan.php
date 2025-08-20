<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function perizinans(): HasMany
    {
        // Nama foreign key (kategori_perizinan_id) akan otomatis dideteksi oleh Laravel
        return $this->hasMany(Perizinan::class, 'kategori_perizinan_id');
    }
}