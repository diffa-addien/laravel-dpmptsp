<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model {
    use HasFactory;
    protected $table = 'pengumuman';
    protected $fillable = ['content', 'link_url', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];
}