<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Perizinan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_perizinan_id',
        'name',
        'slug',
        'requirements',
        'how_to_register', // <-- TAMBAHKAN INI
        'processing_time',
        'fee',
        'is_published'
    ];

    public function kategoriPerizinan(): BelongsTo
    {
        return $this->belongsTo(KategoriPerizinan::class);
    }

}