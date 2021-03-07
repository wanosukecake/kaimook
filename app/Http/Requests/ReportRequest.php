<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AlphaNumCheck;

class ReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // ここ見ておく
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
            'title' => 'required|max:20',
            'type' => 'required|numeric|in:1,2,3,4',
            'time' => 'date_format:H:i',
            'number' => ['numeric', new AlphaNumCheck],
            'body' => 'present|max:1000',
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'hour' => '時間',
            'minutes' => '分',
            'number' => '作業量',
            'time' => '作業時間',
            'body' => 'メモ',
        ];
    }
}
