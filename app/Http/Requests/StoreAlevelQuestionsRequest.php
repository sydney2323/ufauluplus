<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlevelQuestionsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'question_name' => [
                'required'
            ],
            'option1' => [
                'required'
            ],
            'option2' => [
                'required'
            ],
            'option3' => [
                'required'
            ],
            'option4' => [
                'required'
            ],
            'is_correct' => [
                'required'
            ]
        ];
    }
}
