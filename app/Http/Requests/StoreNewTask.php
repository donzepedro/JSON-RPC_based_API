<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewTask extends FormRequest
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
            'text' => 'required|max:128',
            'date' => 'required|date_format:Y-m-d'
        ];
    }
    public function messages()
    {
        return [
            'text.required' => 'A text is required',
            'text.max' => 'A text must be short then 128',
            'date.required' => 'A date is required',
            'date.date_format' => 'A date maust be like Y-m-d',
        ];
    }
}
