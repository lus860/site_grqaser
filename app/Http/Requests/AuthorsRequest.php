<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class AuthorsRequest extends FormRequest
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
            'hy-full-name' => 'required|min:2||max:40',
            'ru-full-name' => 'required|min:2||max:40',
            'en-full-name' => 'required|min:2||max:20',
//            "hy-seo-key" => 'required',
//            'ru-seo-key' => 'required',
//            'en-seo-key' => 'required',
//            "hy-seo-title" => 'required',
//            'ru-seo-title' => 'required',
//            'en-seo-title' => 'required',
//            'hy-seo-description' => 'required|min:2|',
//            'ru-seo-description' => 'required|min:2|',
//            'en-seo-description' => 'required|min:2|',
            "hy-biography" => 'required',
            'ru-biography' => 'required',
            'en-biography' => 'required',
            'was_born' => 'required',
            'file' => 'nullable||image|mimes:jpeg,png,jpg',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator){
            if ($this->file === null && Route::currentRouteName() == 'store_author') {
                $validator->errors()->add('file', 'The file field is required.');
            }
        });
    }

    public function attributes()
    {
        return [
            'hy-full-name' => 'hy. author name',
            'ru-full-name' => 'ru. author name',
            'en-full-name' => 'en. author name',
            'hy-seo-key' => 'hy. seo-key',
            'ru-seo-key' => 'ru. seo-key',
            'en-seo-key' => 'en. seo-key',
            'hy-seo-description' => 'hy. seo-description',
            'ru-seo-description' => 'ru. seo-description',
            'en-seo-description' => 'en. seo-description',
            'hy-biography' => 'hy. biography',
            'ru-biography' => 'ru. biography',
            'en-biography' => 'en. biography',
        ];
    }
}
