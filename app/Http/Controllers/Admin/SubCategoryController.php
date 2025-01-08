<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subCategories = SubCategory::with('productCategory')->get();
        $categories = ProductCategory::all();
        return view('admin.subCategory.index', compact('subCategories', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:product_categories,id',
        ]);

        SubCategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.sub_category.index')->with('success', 'SubCategory created successfully.');
    }

    public function update(Request $request, SubCategory $subCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:product_categories,id',
        ]);

        $subCategory->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.sub_category.index')->with('success', 'SubCategory updated successfully.');
    }

    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        return redirect()->route('admin.sub_category.index')->with('success', 'SubCategory deleted successfully.');
    }
}
