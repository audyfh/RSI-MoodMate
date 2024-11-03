<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuest extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'happy_quest_id', 'status', 'completed_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quest()
    {
        return $this->belongsTo(HappyQuest::class);
    }

    
}
