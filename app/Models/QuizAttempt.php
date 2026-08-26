<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuizAttempt extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'result_id',
        'quiz_id',
        'quiz_name',
        'proprofs_user_id',
        'user_name',
        'user_email',
        'total_marks',
        'obtained_marks',
        'percent_marks',
        'total_correct',
        'total_wrong',
        'total_unanswered',
        'time_taken',
        'time_taken_in_sec',
        'min_pass_marks',
        'attempted_at',
        'raw_payload',
    ];

    protected $casts = [
        'total_marks' => 'integer',
        'obtained_marks' => 'integer',
        'percent_marks' => 'float',
        'total_correct' => 'integer',
        'total_wrong' => 'integer',
        'total_unanswered' => 'integer',
        'time_taken_in_sec' => 'integer',
        'min_pass_marks' => 'integer',
        'attempted_at' => 'datetime',
        'raw_payload' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
