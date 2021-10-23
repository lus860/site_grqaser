<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class BooksRequest extends FormRequest
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
            'hy-description' => 'required',
            'ru-description' => 'required',
            'en-description' => 'required',
            'hy-content' => 'required',
            'ru-content' => 'required',
            'en-content' => 'required',
            'category_id' => 'required',
            'authors' => 'required',
            'file' => 'nullable||image|mimes:jpeg,png,jpg',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator){
            if ($this->file === null && Route::currentRouteName() == 'store_book') {
                $validator->errors()->add('file', 'The file field is required.');
            }
        });
    }

    public function attributes()
    {
        return [
            'hy-full-name' => 'hy. book name',
            'ru-full-name' => 'ru. book name',
            'en-full-name' => 'en. book name',
            'hy-seo-key' => 'hy. seo-key',
            'ru-seo-key' => 'ru. seo-key',
            'en-seo-key' => 'en. seo-key',
            'hy-seo-description' => 'hy. seo-description',
            'ru-seo-description' => 'ru. seo-description',
            'en-seo-description' => 'en. seo-description',
            'hy-content' => 'hy. content',
            'ru-content' => 'ru. content',
            'en-content' => 'en. content',
            'hy-description' => 'hy. description',
            'ru-description' => 'ru. description',
            'en-description' => 'en. description',
        ];
    }
}
