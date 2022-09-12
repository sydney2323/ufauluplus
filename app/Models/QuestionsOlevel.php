<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionsOlevel extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function choiceOlevel()
    {
        return $this->hasMany(ChoiceOlevel::class);
    }

    public function quizOlevel()
    {
        return $this->belongsTo(QuizOlevel::class);
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($questionsOlevel) {
            $questionsOlevel->choiceOlevel()->each(function($choiceOlevel) {
                $choiceOlevel->delete();
            });
        });
    }
}