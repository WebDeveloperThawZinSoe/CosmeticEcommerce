<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico|max:204800',
        ]);

        $iconName = null;

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $iconName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/brands'), $iconName);
        }

        Brand::create([
            'name' => $request->name,
            'description' => $request->description,
            'icon' => $iconName,
        ]);

        return redirect()->route('admin.brand.index')->with('success', 'Brand created successfully.');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico|max:204800',
        ]);

        if ($request->hasFile('icon')) {
            if ($brand->icon && file_exists(public_path('images/brands/' . $brand->icon))) {
                unlink(public_path('images/brands/' . $brand->icon));
            }

            $file = $request->file('icon');
            $iconName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/brands'), $iconName);
            $brand->icon = $iconName;
        }

        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->save();

        return redirect()->route('admin.brand.index')->with('success', 'Brand updated successfully.');
    }

    public function destroy(Brand $brand)
    {
        if ($brand->icon && file_exists(public_path('images/brands/' . $brand->icon))) {
            unlink(public_path('images/brands/' . $brand->icon));
        }

        $brand->delete();

        return redirect()->route('admin.brand.index')->with('success', 'Brand deleted successfully.');
    }
}
