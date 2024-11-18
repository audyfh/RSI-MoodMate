<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmotionTrack extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'emotion', 'user_id'];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
