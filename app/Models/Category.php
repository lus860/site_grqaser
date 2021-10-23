<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Facades\DB;
use App\Models\Book;

class Category extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['category_name', 'seo_key', 'seo_title', 'seo_description'];

    protected $fillable = [
        'name'
    ];

    public $timestamps = false;

    public static function getAll($paginate = null) {
//        return self::join('category_translations as t', 't.category_id', '=', 'categories.id')
//            ->where('locale', 'ru')
//            ->get();

        $categories = Category::with('translations')
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('category_translations')
                    ->whereColumn('category_translations.category_id', 'categories.id');
            });
           return ($paginate) ? $categories->paginate($paginate) : $categories->get();

    }


    public static function getSearch($search) {
        $categories =  Category::with('translations')
            ->whereExists(function ($query) use($search){
                $query->select(DB::raw(1))
                    ->from('category_translations')
                    ->whereColumn('category_translations.category_id', 'categories.id')
                    ->where('category_name', 'LIKE', "%$search%");
            });
        return $categories->get();

    }

    public static function setAttributes($request)
    {
        $category_data = [];
        $languages = Language::getIsos();
        foreach ($languages as $language){
            $category_data[$language] = [
                'category_name'    => $request->input($language.'-category-name'),
                'seo_key' => $request->input($language.'-seo-key')??null,
                'seo_title' => $request->input($language.'-seo-title')??null,
                'seo_description' => $request->input($language.'-seo-description')??null,
            ];
        }

        return $category_data;
    }

    public function books()
    {
        return $this->hasMany(\App\Models\Book::class);
    }
}
