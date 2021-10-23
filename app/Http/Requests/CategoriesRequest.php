<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class CategoriesRequest extends FormRequest
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
            'hy-category-name' => 'required|min:2||max:40',
            'ru-category-name' => 'required|min:2||max:40',
            'en-category-name' => 'required|min:2||max:20',

        ];
    }

    public function attributes()
    {
        return [
            'hy-category-name' => 'hy. category name',
            'ru-category-name' => 'ru. category name',
            'en-category-name' => 'en. category name',
            'hy-seo-key' => 'hy. seo-key',
            'ru-seo-key' => 'ru. seo-key',
            'en-seo-key' => 'en. seo-key',
            'hy-seo-description' => 'hy. seo-description',
            'ru-seo-description' => 'ru. seo-description',
            'en-seo-description' => 'en. seo-description',

        ];
    }
}
