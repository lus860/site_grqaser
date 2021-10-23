<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Support\Carbon;
use App;

class Book extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['full_name', 'seo_key', 'seo_title', 'seo_description', 'description', 'content'];

    protected $fillable = [
        'image', 'category_id'
    ];

    public static function getAll($paginate = null, $desc = 'created_at') {
//        return self::join('book_translations as t', 't.book_id', '=', 'books.id')
//            ->where('locale', 'ru')
//            ->with('translations','authors','category')
//            ->get();
        $books =  Book::with('translations', 'authors', 'category')
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('book_translations')
                    ->whereColumn('book_translations.book_id', 'books.id');
            });
           return ($paginate) ? $books->paginate($paginate) : $books->orderBy($desc, 'desc')->get();

    }


    public static function getSearch($search) {
        $books =  Book::with('translations', 'authors', 'category')
            ->whereExists(function ($query) use ($search){
                $query->select(DB::raw(1))
                    ->from('book_translations')
                    ->whereColumn('book_translations.book_id', 'books.id')
                    ->where('book_translations.full_name', 'LIKE', "%$search%");
            });
        return $books->get();

    }

    public static function MostDownloaded($time) {
        $books =  Book::with('translations', 'authors', 'category')
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('book_translations')
                    ->whereColumn('book_translations.book_id', 'books.id');
            });

        if($time == 'week'){
            return $books->where('created_at', '>=', Carbon::now()->subDays(7)->toDateString())->get();
        }elseif($time == 'month'){
            return $books->where('created_at', '>=', Carbon::now()->subMonth()->toDateString())->get();
        }elseif($time == 'years'){
            return $books->where('created_at', '>=', Carbon::now()->subYear()->toDateString())->get();
        }else{
            return false;
        }

    }

    public static function setAttributes($request)
    {
        $book_data = [];
        $languages = Language::getIsos();
        foreach ($languages as $language){
            $book_data[$language] = [
                'full_name' => $request->input($language.'-full-name'),
                'seo_key' => $request->input($language.'-seo-key')??null,
                'seo_title' => $request->input($language.'-seo-title')??null,
                'seo_description' => $request->input($language.'-seo-description')??null,
                'description' => $request->input($language.'-description'),
                'content' => $request->input($language.'-content'),
            ];
        }

        return $book_data;
    }

    public function authors()
    {
        return $this->belongsToMany('App\Models\Author', 'author_book');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function getAuthorsName($user = null)
    {
        $names = [];
        $authors = $this->authors()->get()->toArray();
        foreach ($authors as $author) {
            if(count($authors)>0){
                $names[] = $author['full_name'];
            }else{
                return $author['full_name'];
            }
        }

        return ($user) ? $names: implode(" ,", $names);

    }

    public function getShortText($text,$limit=200)
    {
        $text = mb_substr($text, 0, $limit);
        $firsPos = strripos($text, ' ');
        $text = mb_substr($text, 0, $firsPos);
        return $text.'...';

    }

    public function getShortTextContent($text,$limit=200)
    {
        $text = strip_tags($text);
        $text = mb_substr($text, 0, $limit);
//        $firsPos = strripos($text, ' ');
//        $text = mb_substr($text, 0, $firsPos);
        return $text.'...';

    }


    public function inArray($id)
    {
        $authors = $this->authors()->get()->toArray();
        foreach ($authors as $author) {
            if(count($authors)>0) {
                if ($author['id'] == $id) {
                    return true;
                }
            }
        }
        return false;
    }

    public function categoryName($id)
    {
        return Category::find($id)->getTranslation()->category_name;
    }
}
