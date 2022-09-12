<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizOlevel extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function questionsOlevel()
    {
        return $this->hasMany(QuestionsOlevel::class);

    }
    public static function boot() {
        parent::boot();
        self::deleting(function($quizOlevel) {
            $quizOlevel->questionsOlevel()->each(function($questionsOlevel) {
                    $questionsOlevel->delete();
            });
        });
    }

}
    

// return $this->hasManyThrough(
//     'App\Post',
//     'App\User',
//     'country_id', // Foreign key on users table...
//     'user_id', // Foreign key on posts table...
//     'id', // Local key on countries table...
//     'id' // Local key on users table...
//     );