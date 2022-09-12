<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChoiceAlevel extends Model
{
    use HasFactory;
    protected $guarded = [];

public function questionsAlevel()
{
    return $this->belongsTo(QuestionsAlevel::class);
}
}
