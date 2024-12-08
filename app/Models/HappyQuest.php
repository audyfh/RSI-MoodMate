<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HappyQuest extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function userQuests(): HasMany
    {
        return $this->hasMany(UserQuest::class);
    }

    public function isCompletedByUser($user): bool
    {
        return $this->userQuests()
            ->where('user_id', $user->id)
            ->where('status', 'completed')
            ->exists();
    }
}
