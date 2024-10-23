<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->orderBy('id', 'desc')->paginate(10);
        return view('dashboard.products.index', compact('products'));
    }
    public function shop()
    {
        $products = Product::with('category')->orderBy('id', 'desc')->simplePaginate(10);
        return view('website.pages.shop', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
{
    $validatedData = $request->validated();

    if ($request->hasFile('image')) {
        $validatedData['image'] = $request->file('image')->store('products', 'public');
    }

    $validatedData['create_user_id'] = auth()->id();

    Product::create($validatedData);

    return redirect()->route('products.index')->with('success', 'Product created successfully.');
}

    public function show($id, Product $product)
    {
        $product = Product::findOrFail($id);
        return view('dashboard.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('dashboard.products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, Product $product)
{
    $validatedData = $request->validated();

    if ($request->hasFile('image')) {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $validatedData['image'] = $request->file('image')->store('products', 'public');
    }

    $validatedData['update_user_id'] = auth()->id();

    $product->update($validatedData);

    return redirect()->route('products.index')->with('success', 'Product updated successfully.');
}

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function delete()
    {
        $products = Product::onlyTrashed()->with('category')->orderBy('deleted_at', 'desc')->paginate(10);
        return view('dashboard.products.delete', compact('products'));
    }

    public function restore($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        $product->restore();
        return redirect()->route('products.index')->with('success', 'Product restored successfully.');
    }

    public function forceDelete($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->forceDelete();
        return redirect()->route('products.delete')->with('success', 'Product permanently deleted.');
    }
}
