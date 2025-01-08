<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        return view('admin.productCategory.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.productCategory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $iconName = null;

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $iconName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/product_categories'), $iconName);
        }

        ProductCategory::create([
            'name' => $request->name,
            'description' => $request->description,
            'icon' => $iconName,
        ]);

        return redirect()->route('admin.product_categories.index')->with('success', 'Product Category created successfully.');
    }

    public function edit(ProductCategory $productCategory)
    {
        return view('admin.productCategory.edit', compact('productCategory'));
    }

    public function update(Request $request, ProductCategory $productCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('icon')) {
            // Delete the old icon if it exists
            if ($productCategory->icon && file_exists(public_path('images/product_categories/' . $productCategory->icon))) {
                unlink(public_path('images/product_categories/' . $productCategory->icon));
            }

            $file = $request->file('icon');
            $iconName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/product_categories'), $iconName);
            $productCategory->icon = $iconName;
        }

        $productCategory->name = $request->name;
        $productCategory->description = $request->description;
        $productCategory->save();

        return redirect()->route('admin.product_categories.index')->with('success', 'Product Category updated successfully.');
    }

    public function destroy(ProductCategory $productCategory)
    {
        if ($productCategory->icon && file_exists(public_path('images/product_categories/' . $productCategory->icon))) {
            unlink(public_path('images/product_categories/' . $productCategory->icon));
        }

        $productCategory->delete();

        return redirect()->route('admin.product_categories.index')->with('success', 'Product Category deleted successfully.');
    }
}
