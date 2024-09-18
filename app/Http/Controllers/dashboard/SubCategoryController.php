<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubCategoryController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $subCategories = SubCategory::orderBy('id', 'desc')->simplePaginate(4);
        return view('dashboard.pages.subCategories.index', compact('subCategories'));
    }
        /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

}
