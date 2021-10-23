<?php

namespace App\Http\Controllers\user;

use App\Models\Book;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Author;

class BookController extends Controller
{
    public function search(Request $request)
    {
        if($request->ajax()){
            if(isset($request->search)){
                $search = $request->search;
            }
            $books = Book::getSearch($search);
            $authors = Author::getSearch($search);
            $categories = Category::getSearch($search);
            $all_book = $books->merge($authors,$categories);
            return view('user.ajax.search',['books'=>$all_book,'search'=>$search])->render();
        }

        return false;

    }

    public function searchShow(Request $request){
        $search = $request->search;
        $books = Book::getSearch($search);
        $authors = Author::getSearch($search);
        $categories = Category::getSearch($search);
        $all_book = $books->merge($authors,$categories);
        return view('user.search',['books'=>$all_book]);
    }

    public function index($time = 'week')
    {
        $data['languages'] = Language::getLanguages();
        $data['books'] = Book::getAll();
        $data['rated_books'] = Book::getAll(null, 'rating');
        $data['most_downloaded'] = Book::MostDownloaded($time);
        $data['authors'] = Author::getAll();
        return view('user.index',$data);
    }

    public function show($id)
    {
        $book = Book::find($id);
        return view('user.book',['book' => $book]);
    }

    public function books()
    {
        $books = Book::getAll(3);
        return view('user.books', ['books' => $books]);

    }

    public function authors()
    {
        $authors = Author::getAll(3);
        return view('user.authors', ['authors' => $authors]);

    }

    public function category($id)
    {
        $category = Category::find($id);
        $books = $category->books()->paginate(2);
//        $data['books'] = Book::where('category_id', $category)->with('translations', 'authors', 'category');
        return view('user.category_books',['category' => $category, 'books' => $books]);
    }

    public function author($id)
    {
        $author = Author::find($id);
        if(Request()->route()->getName() == 'biography'){
            return view('user.author_biography',['author' => $author]);
        }

        if(Request()->route()->getName() == 'author'){
            $books = $author->books()->paginate(3);
            return view('user.author_books',['author' => $author, 'books' => $books]);
        }
        return false;

    }


}
