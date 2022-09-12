<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAlevel extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function questionsAlevel()
    {
        return $this->hasMany(QuestionsAlevel::class);

    }
    public function choiceAlevel()
    {
        return $this->hasManyThrough( ChoiceAlevel::class, QuestionsAlevel::class, 'quiz_alevel_id', 'questions_alevel_id','id','id');

    }

    public static function boot() {
        parent::boot();
        self::deleting(function($quizAlevel) {
            $quizAlevel->questionsAlevel()->each(function($questionsAlevel) {
                    $questionsAlevel->delete();
            });
        });
    }

}
