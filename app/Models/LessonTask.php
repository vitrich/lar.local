<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LessonTask extends Model
{
    protected $fillable = [
        'lesson_id',
        'student_id',
        'tasks_data',
        'answers',
        'score',
        'correct_count',
        'total_count',
        'submitted_at',
    ];

    protected $casts = [
        'tasks_data'   => 'array',    // JSON → array
        'answers'      => 'array',    // JSON → array
        'submitted_at' => 'datetime',
    ];

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    // сюда позже переносишь generateTasks(), checkAnswers() из Django‑логики
}
