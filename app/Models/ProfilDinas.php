<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilDinas extends Model {
    use HasFactory;
    protected $table = 'profil_dinas';
    protected $fillable = [
        'address', 'phone', 'email', 'facebook_url', 
        'instagram_url', 'twitter_url', 'youtube_url'
    ];
}