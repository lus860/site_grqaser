<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageController;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Requests\AuthorsRequest;
use Illuminate\Support\Facades\Route;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

    }

    public function index()
    {
        $data['languages'] = Language::getLanguages();
        $data['authors'] = Author::getAll(3);
        $data['title'] = 'Authors';
        return view('admin.authors.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['languages'] = Language::getLanguages();
        $data['title'] = 'Add new Author';
        return view('admin.authors.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorsRequest $request)
    {
        if($request->file){
            $image = ImageController::imageUpload($request->file);
        }
        $author_data = Author::setAttributes($request);
        $author_data['image'] = $image;
        $author_data['was_born'] = $request->input('was_born');
        $author_data['died'] = $request->input('died');
        $author = Author::create($author_data);


        if($author){
                $meesages = 'Author saved !!';
                return redirect('/admin/authors')->with('success', $meesages);
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
        $data['author'] = Author::find($id);
        $data['languages'] = Language::getLanguages();
        $data['title'] = 'Edit Author';

        return view('admin.authors.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorsRequest $request, $id)
    {
        $author = Author::find($id);

        if($request->get('file')){
            ImageController::imageDelete($author->image);
            $image = ImageController::imageUpload($request->file);
            $author->image = $image;
        }

        $author_data = Author::setAttributes($request);
        $author_data['was_born'] = $request->input('was_born');
        $author_data['died'] = $request->input('died');

        if($author){
            if($author->update($author_data)){
                $meesages = 'Author updated !!';
                return redirect('/admin/authors')->with('success', $meesages);
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
        $author = Author::find($id);
        $image = $author->image;
        if($author){
            if($author->translations()->delete() && $author->delete()){
                ImageController::imageDelete($image);
                $meesages = 'Author deleted !!';
                return redirect('/admin/authors')->with('success', $meesages);
            }
            return redirect()->back()->with('error', 'Some mistake went !!');
        }
        return redirect()->back()->with('error', 'Some mistake went !!');
    }
}
