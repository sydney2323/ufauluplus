<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionsAlevel extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function quizAlevel()
    {
        return $this->belongsTo(QuizAlevel::class);
    }

    public function choiceAlevel()
    {
        return $this->hasMany(ChoiceAlevel::class);
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($questionsAlevel) {
            $questionsAlevel->choiceAlevel()->each(function($choiceAlevel) {
                $choiceAlevel->delete();
            });
        });
    }
}
