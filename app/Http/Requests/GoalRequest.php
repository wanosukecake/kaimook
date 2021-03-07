<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AlphaNumCheck;

class GoalRequest extends FormRequest
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
            'type' => 'required|numeric|in:1,2,3,4',
            'goal' => ['required', new AlphaNumCheck,'numeric','min:1','max:999']
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'type' => '種類',
            'goal' => '内容',
        ];
    }
}
