<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GroupHistory extends Model
{
    protected $fillable = [
        'student_id',
        'group_id',
        'transfer_date',
        'reason',
    ];

    protected $casts = [
        'transfer_date' => 'date',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
