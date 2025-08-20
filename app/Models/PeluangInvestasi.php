<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class PeluangInvestasi extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'peluang_investasis';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('investment_image')->singleFile();
    }
}