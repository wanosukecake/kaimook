<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'hour' => 'numeric',
            'minutes' => 'numeric',
            'body' => 'present|max:1000',
            'is_public' => 'required|numeric',
            'published_at' => 'date_format:Y-m-d H:i',
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
            'body' => 'メモ',
            'is_public' => 'ステータス',
            'published_at' => '公開日',
        ];
    }
}
