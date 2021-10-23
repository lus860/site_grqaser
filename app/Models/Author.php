<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Facades\DB;


class Author extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['full_name', 'seo_key', 'seo_title', 'seo_description', 'biography'];

    protected $fillable = [
        'image', 'was_born', 'died'
    ];

    public static function getAll($paginate = null) {
//        return Author::join('author_translations as t', 't.author_id', '=', 'authors.id')
//            ->where('t.locale', '=', 'ru')
//            ->get();


//        return Author::with('translations')->where(function ($query) {
//            $query->whereNotNull($query->author_id);
//        })
//            ->paginate($paginate);

        $authors = Author::with('translations', 'books')
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('author_translations')
                    ->whereColumn('author_translations.author_id', 'authors.id');
            });
            return ($paginate) ? $authors->paginate($paginate) : $authors->get();

    }

    public static function getSearch($search) {
        $authors =  Author::with('translations', 'books')
            ->whereExists(function ($query) use($search){
                $query->select(DB::raw(1))
                    ->from('author_translations')
                    ->whereColumn('author_translations.author_id', 'authors.id')
                    ->where('full_name', 'LIKE', "%$search%");
            });
        return $authors->get();

    }

    public static function setAttributes($request)
    {
        $author_data = [];
        $languages = Language::getIsos();
        foreach ($languages as $language){
            $author_data[$language] = [
                'full_name'    => $request->input($language.'-full-name'),
                'seo_key' => $request->input($language.'-seo-key')??null,
                'seo_title' => $request->input($language.'-seo-title')??null,
                'seo_description' => $request->input($language.'-seo-description')??null,
                'biography' => $request->input($language.'-biography'),
            ];
        }

        return $author_data;
    }

    public function getBooksName($user = null)
    {
        $names = [];
        $books = $this->books()->get()->toArray();
        foreach ($books as $book) {
            if(count($books)>0){
                $names[] = $book['full_name'];
            }else{
                return $book['full_name'];
            }
        }

        return ($user) ? $names: implode(" ,", $names);

    }

    public function getShortText($text,$limit=200)
    {
        $text = strip_tags($text);
        $text = mb_substr($text, 0, $limit);
//        $firsPos = strripos($text, ' ');
//        $text = mb_substr($text, 0, $firsPos);
        return $text.'...';

    }

    public function books()
    {
        return $this->belongsToMany('App\Models\Book', 'author_book');
    }
}
