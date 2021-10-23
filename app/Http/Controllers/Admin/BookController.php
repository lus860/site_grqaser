<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageController;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Http\Requests\BooksRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['languages'] = Language::getLanguages();
        $data['books'] = Book::getAll(3);
        return view('admin.books.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['languages'] = Language::getLanguages();
        $data['authors'] = Author::getAll();
        $data['categories'] = Category::getAll();
        return view('admin.books.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BooksRequest $request)
    {
        if($request->file){
            $image = ImageController::imageUpload($request->file);
        }
        $book_data = Book::setAttributes($request);
        $book_data['image'] = $image;
        $book_data['rating'] = $request->input('rating');
        $book_data['category_id'] = $request->input('category_id');
        $book = Book::create($book_data);

        if($book){
            $book_id = Book::latest()->first()->id;
            foreach ($request->authors as $id){
                $author = Author::find($id);
                $author->books()->attach($book_id);
            }
            $meesages = 'Book saved !!';
            return redirect('/admin/books')->with('success', $meesages);

        }

        return redirect()->back()->with('error', 'Some mistake went !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['languages'] = Language::getLanguages();
        $data['authors'] = Author::getAll();
        $data['categories'] = Category::getAll();
        $data['book'] = Book::find($id);
        $data['title'] = 'Edit Book';

        return view('admin.books.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BooksRequest $request, $id)
    {
        $book = Book::find($id);
        $old_authors = $book->authors;
        $old_id = $book->id;
        $book_data = Book::setAttributes($request);
        $book_data['category_id'] = $request->input('category_id');
        $book_data['rating'] = $request->input('rating');
        if($request->file) {
            ImageController::imageDelete($book->image);
            $image = ImageController::imageUpload($request->file);
            $book_data['image'] = $image;
        }

        if($book){
            if($book->update($book_data)){
                foreach ($old_authors as $old_author){
                    $old_author->books()->detach($old_id);
                }

                foreach ($request->authors as $id){
                    $author = Author::find($id);
                    $author->books()->attach($old_id);
                }
                $meesages = 'Book updated !!';
                return redirect('/admin/books')->with('success', $meesages);
            }
            return redirect()->back()->with('error', 'Some mistake went !!');
        }

        return redirect()->back()->with('error', 'Some mistake went !!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $image = $book->image;
        if($book){
            if($book->translations()->delete() && $book->delete()){
                ImageController::imageDelete($image);
                $meesages = 'Book deleted !!';
                return redirect('/admin/books')->with('success', $meesages);
            }
            return redirect()->back()->with('error', 'Some mistake went !!');
        }
        return redirect()->back()->with('error', 'Some mistake went !!');
    }
}
