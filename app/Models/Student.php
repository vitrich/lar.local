<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'full_name',
        'class_name',
        'current_group_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function currentGroup(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'current_group_id');
    }

    public function groupHistory(): HasMany
    {
        return $this->hasMany(GroupHistory::class);
    }

    public function lessonTasks(): HasMany
    {
        return $this->hasMany(LessonTask::class);
    }
}
