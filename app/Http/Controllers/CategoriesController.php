<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('blog.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $request->validated();

        $categoryImage = $request->file('featured')->getClientOriginalName();

        $fileName = pathinfo($categoryImage, PATHINFO_FILENAME);
        $fileExtension = $request->file('featured')->getClientOriginalExtension();
        $file = $fileName . '_' . substr(sha1(rand()), 0, 8). '.' .$fileExtension;
        $request->file('featured')->storeAs('public/categories', $file);

        $category = new Category;
        $category->title = $request->input('title');
        $category->content = $request->input('content');
        $category->featured = $file;
        $isSaved = $category->save();

        if (!$isSaved) {
            return redirect(route('categories.index'))->with('failed', 'New category was not saved');
        }

        return redirect(route('categories.index'))->with('success', 'New category saved');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        return view('blog.categories.show',
            [
                'category' => $category,
                'posts' => $category->posts
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('blog.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->title = $request->get('title');
        $category->content = $request->get('content');
        $category->save();

        return redirect(route('categories.show', $category->id))->with('success', 'Category updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);

        return redirect(route('categories.index'))->with('success', 'Category deleted');
    }
}
