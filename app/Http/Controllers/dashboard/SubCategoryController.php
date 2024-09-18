<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SubCategoryController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $subCategories = SubCategory::orderBy('id', 'desc')->simplePaginate(4);
        return view('dashboard.pages.sub-category.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $subCategory = new SubCategory();
        // pass available categories to the view
        $categories = Category::all();
        return view('dashboard.pages.sub-category.create', compact('subCategory', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubCategoryRequest $request): RedirectResponse
    {
        SubCategory::create($request->validated());

        return Redirect::route('sub-categories.index')
            ->with('success', 'SubCategory created successfully.');
    }

}
