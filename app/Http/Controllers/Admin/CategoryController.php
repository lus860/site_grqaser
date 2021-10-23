<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageController;
use App\Models\Author;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoriesRequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['languages'] = Language::getLanguages();
        $data['categories'] = Category::getAll(2);
        $data['title'] = 'Categories';
        return view('admin.categories.index', $data);
    }

    public function create()
    {
        $data['languages'] = Language::getLanguages();
        $data['title'] = 'Add new Category';
        return view('admin.categories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        $category_data = Category::setAttributes($request);
        $category = Category::create($category_data);

        if($category){
            $category->name = $request->input('en-category-name');
            if($category->save()){
                $meesages = 'Category saved !!';
                return redirect('/admin/categories')->with('success', $meesages);
            }
            return redirect()->back()->with('error', 'Some mistake went !!');
        }

        return redirect()->back()->with('error', 'Some mistake went !!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['category'] = Category::find($id);
        $data['languages'] = Language::getLanguages();
        $data['title'] = 'Edit Category';

        return view('admin.categories.edit', $data);
    }

    public function show($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request, $id)
    {
        $category = Category::find($id);

        $category_data = Category::setAttributes($request);

        if($category){
            if($category->update($category_data)){
                $meesages = 'Category updeted !!';
                return redirect('/admin/categories')->with('success', $meesages);
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
        $category = Category::find($id);
        if($category){
            if($category->translations()->delete() && $category->delete()){
                $meesages = 'Category deleted !!';
                return redirect('/admin/categories')->with('success', $meesages);
            }
            return redirect()->back()->with('error', 'Some mistake went !!');
        }
        return redirect()->back()->with('error', 'Some mistake went !!');
    }
}
