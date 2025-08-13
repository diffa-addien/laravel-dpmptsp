<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Sdm extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'sdms';

    protected $fillable = [
        'name',
        'position_name',
        'position_type',
        'sequence',
    ];

    // Mendefinisikan koleksi media 'photo' dan memastikan hanya satu file yang bisa diunggah
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('sdm_photo')->singleFile();
    }
}
