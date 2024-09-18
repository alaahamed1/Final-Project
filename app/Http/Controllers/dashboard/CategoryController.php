<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $categories = Category::orderBy('id' , 'desc')->simplePaginate(4);
        return view('dashboard.pages.categories.index ' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['create_user_id'] = auth()->user()->id;
        Category::create($validatedData);
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::find($id);
        if($category == null){
            return view('dashboard.pages.categories.404.category-404');
        }
        return view('dashboard.pages.categories.show' , compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( int $id)
    {
        $category = Category::find($id);
        if($category == null){
            return view('dashboard.pages.categories.404.category-404');
        }
        else{
            if(auth()->user()->user_type  == "admin"){
                return view('dashboard.pages.categories.edit' , compact('category'));
            }
            else{
                return view('dashboard.pages.categories.404.category-404');
            }
        }
    }

    /**

     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1020',
            'create_user_id' => 'nullable|exists:users,id',
            'update_user_id' => 'nullable|exists:users,id',
        ]);

        // Update Category
        $category = Category::find($id);
        $category->title = $request->title;
        $category->description = $request->description;
        $category->update_user_id = auth()->user()->id;
        $category->save();
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }


    public function delete(){
        $categories = Category::orderBy('id' , 'desc')->onlyTrashed()->simplePaginate(4);
        $categories_count = $categories->count();
        return view('dashboard.pages.categories.delete' , compact('categories' , 'categories_count'));
    }
    public function restore($id){
        $category = Category::withTrashed()->find($id);
        $category->restore();
        $category = Category::findOrFail($id);
        $category->update_user_id = auth()->user()->id;
        $category->save();
        return redirect()->route('categories.index');
}
    public function forceDelete($id){
        $category = Category::where('id' , $id);
        $category->forceDelete();
        return redirect()->route('categories.index');
    }
}
