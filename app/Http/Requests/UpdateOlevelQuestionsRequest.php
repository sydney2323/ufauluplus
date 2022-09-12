<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOlevelQuestionsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
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
