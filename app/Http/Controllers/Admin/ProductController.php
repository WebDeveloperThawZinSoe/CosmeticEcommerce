<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariants;
use App\Models\ProductCategory;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Supply;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'subCategory', 'variants'])
        ->orderBy("id", "desc")
        ->get();
        $categories = ProductCategory::all();
        $subCategories = SubCategory::all();

        return view('admin.products.index', compact('products', 'categories', 'subCategories'));
    }

    public function create()
    {
        $categories = ProductCategory::all();
        $subCategories = SubCategory::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('categories', 'subCategories', 'brands'));
    }

    
    public function create_v2()
    {
        $categories = ProductCategory::all();
        $subCategories = SubCategory::all();
        $brands = Brand::all();
        return view('admin.products.create_v2', compact('categories', 'subCategories', 'brands'));
    }

    public function store(Request $request)
    {
        // Validate inputs
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:product_categories,id',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'required|string',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico|max:204800', // Single thumbnail image
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico|max:2048000', // Multiple images
            
        ]);

        // Process and save thumbnail image
        if ($request->hasFile('image')) {
            $thumbnailImage = $request->file('image');
            $thumbnailPath = 'product_images/' . uniqid() . '_' . $thumbnailImage->getClientOriginalName();
            $thumbnailImage->move(public_path('product_images'), $thumbnailPath);
        }

        // Process and save multiple images
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = 'product_images/' . uniqid() . '_' . $image->getClientOriginalName();
                $image->move(public_path('product_images'), $imagePath);
                $imagePaths[] = $imagePath;
            }
        }

        // Create product record
        $product = Product::create([
            'name' => $validatedData['name'],
            'category_id' => $validatedData['category_id'],
            // 'sub_category_id' => $validatedData['sub_category_id'],
            'brand_id' => $validatedData['brand_id'],
            'price' => $validatedData['price'],
            'stock' => $validatedData['stock'],
            "short_description" => $request->shortdescription,
            'description' => $validatedData['description'],
            'status' => $validatedData['status'],
            'image' => $thumbnailPath ?? null, // Save single image path
            'images' => json_encode($imagePaths), // Save multiple image paths as JSON
            'discount_type' => $request->discount_type ?? '0',
            'discount_amount' => $request->discount_amount ?? 0,
            "pre_order" => $request->pre_order
        ]);

        // Create product variant
        $vp = $product->variants()->create([
            'price' => $validatedData['price'], 
            'stock' => $validatedData['stock'], 
            'image' => $thumbnailPath ?? null,
            'status' => $validatedData['status'],
            'discount_type' => $request->discount_type ?? '0',
            'discount_amount' => $request->discount_amount ?? 0,
        ]);
        // Add Supply
        Supply::create([
            "product_id" => $product->id,
            "varaint_product_id" => $vp->id,
            "type" => 1,
            "qty" => $validatedData['stock'],
            "description" => "Product Create",
           "date" => now()->format('Y-m-d'),
        ]);
        // Redirect with a success message
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function store_variant_product(Request $request)
    {
        // Validate inputs
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:product_categories,id',
            'brand_id' => 'required|exists:brands,id',
            'description' => 'required|string',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico|max:204800', // Validate main product image
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico|max:204800', // Validate multiple images
            'variants' => 'required|array',
            'variants.*.attribute_name' => 'required|string',
            'variants.*.attribute_value' => 'required|string',
            'variants.*.price' => 'required|numeric',
            'variants.*.stock' => 'required|integer',
            'variants.*.image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico|max:204800', // Validate each variant image
        ]);
    
        // Initialize total stock
        $totalStock = 0;
    
        // Process the main product image
        $productImage = $request->file('image');
        $productImagePath = 'product_images/' . uniqid() . '_' . $productImage->getClientOriginalName();
        $productImage->move(public_path('product_images'), $productImagePath);
    
        // Process and save multiple images
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = 'product_images/' . uniqid() . '_' . $image->getClientOriginalName();
                $image->move(public_path('product_images'), $imagePath);
                $imagePaths[] = $imagePath; // Collect image paths
            }
        }
    
        // Create the main product record
        $product = Product::create([
            'name' => $validatedData['name'],
            'category_id' => $validatedData['category_id'],
            // 'sub_category_id' => $validatedData['sub_category_id'],
            'brand_id' => $validatedData['brand_id'],
            "short_description" => $request->shortdescription,
            'description' => $validatedData['description'],
            'status' => $validatedData['status'],
            'image' => $productImagePath, // Store the product image path
            'images' => json_encode($imagePaths), // Save multiple image paths as JSON
            "product_type" => 2 ,
            'discount_type' => $validatedData['discount_type'] ?? '0',
            'discount_amount' => $validatedData['discount_amount'] ?? 0,
            "pre_order" => $request->pre_order
        ]);
    
        // Loop through each variant to save them
        foreach ($validatedData['variants'] as $variant) {
            // Initialize image path for each variant
            $variantImagePath = null;
    
            // Process and save each variant image
            if (isset($variant['image']) && $variant['image']->isValid()) {
                $variantImage = $variant['image'];
                $variantImagePath = 'product_images/' . uniqid() . '_' . $variantImage->getClientOriginalName();
                $variantImage->move(public_path('product_images'), $variantImagePath);
            }
    
            // Ensure the image path is not null before creating the variant
            if ($variantImagePath) {
                // Calculate total stock
                $totalStock += $variant['stock'];
    
                // Create product variant
                $vp = $product->variants()->create([
                    'attribute_name' => $variant['attribute_name'],
                    'attribute_value' => $variant['attribute_value'],
                    'price' => $variant['price'],
                    'stock' => $variant['stock'],
                    'image' => $variantImagePath,
                    'status' => $validatedData['status'],
                    'discount_type' => $validatedData['discount_type'] ?? '0',
                    'discount_amount' => $validatedData['discount_amount'] ?? 0,
                ]);

                 // Add Supply
                Supply::create([
                    "product_id" => $product->id,
                    "varaint_product_id" => $vp->id,
                    "type" => 1,
                    "qty" => $variant['stock'],
                    "description" => "Product Create",
                "date" => now()->format('Y-m-d'),
                ]);
            } else {
                return redirect()->back()->withErrors(['variants' => 'Each variant must have a valid image.']);
            }
        }
    
        // Update the product stock with the total stock from variants
        $product->stock = $totalStock;
        $product->save();
    
        // Redirect with a success message
        return redirect()->route('admin.products.index')->with('success', 'Product with variants created successfully.');
    }
    

    private function moveImage($image, $folder)
    {
        // Create the folder if it doesn't exist
        $path = public_path($folder);
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        // Generate a unique file name for the image
        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

        // Move the uploaded image to the desired directory
        $image->move($path, $imageName);

        // Return the path for the image
        return "$folder/$imageName";
    }

    public function productEditV2($id)
    {
        // Retrieve the product by ID and load its variants
        $product = Product::with('variants')->findOrFail($id);
        $categories = ProductCategory::all();
        $subCategories = SubCategory::all();
        $brands = Brand::all();
        // Pass the product data to the view
        return view('admin.products.edit_v2', compact('product','categories','subCategories','brands'));
    }
    
    public function updateProductV2(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico|max:204800',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico|max:204800',
        ]);

        $id = $request->id;
        $product = Product::findOrFail($id);

        // Update product fields
        $product->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'category_id' => $request->category_id,
            'brand_id' =>  $request->brand_id,
            "short_description" => $request->shortdescription,
            'status' => $request->status
        ]);

        // Update main product image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'product_images/' . uniqid() . '_' . $image->getClientOriginalName();
            $image->move(public_path('product_images'), $imagePath);
            $product->image = $imagePath;
        }

        // Update additional product images
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePath = 'product_images/' . uniqid() . '_' . $image->getClientOriginalName();
                $image->move(public_path('product_images'), $imagePath);
                $imagePaths[] = $imagePath;
            }
            $product->images = json_encode($imagePaths);
        }
        $product->save();

        // Update each variant
        // foreach ($validatedData['variants'] as $variantId => $variantData) {
        //     $variant = $product->variants()->find($variantId);
        //     if ($variant) {
        //         $variant->update([
        //             'price' => $variantData['price'] ?? $variant->price,
        //             'stock' => $variantData['stock'] ?? $variant->stock,
        //             'status' => $variantData['status'] ?? $variant->status,
        //         ]);

        //         if (isset($variantData['image']) && $request->hasFile("variants.$variantId.image")) {
        //             $variantImage = $request->file("variants.$variantId.image");
        //             $variantImagePath = 'product_images/' . uniqid() . '_' . $variantImage->getClientOriginalName();
        //             $variantImage->move(public_path('product_images'), $variantImagePath);
        //             $variant->image = $variantImagePath;
        //             $variant->save();
        //         }
        //     }
        // }

        return redirect()->route('admin.products.index')->with('success', 'Product and variants updated successfully.');
    }



    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        $subCategories = SubCategory::all();
        $brands = Brand::all();
        return view('admin.products.edit', compact('product','brands', 'categories', 'subCategories'));
    }



    public function update(Request $request, Product $product)
    {
        // Validate inputs
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:product_categories,id',
            // 'sub_category_id' => 'required|exists:sub_categories,id',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico|max:204800',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico|max:204800',
            'status' => 'required',
            'discount_type' => 'nullable|string',
            'discount_amount' => 'nullable|numeric',
        ]);
    
        // Store the existing image path
        $thumbnailPath = $product->image;
    
        // Process and update thumbnail image if provided
        if ($request->hasFile('image')) {
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image)); // Remove old image
            }
    
            $thumbnailImage = $request->file('image');
            $thumbnailPath = 'product_images/' . uniqid() . '_' . $thumbnailImage->getClientOriginalName();
            $thumbnailImage->move(public_path('product_images'), $thumbnailPath);
        }
    
        // Update additional images if provided
        $imagePaths = $product->images; // Already decoded as an array by the accessor
    
        if ($request->hasFile('images')) {
            foreach ($imagePaths as $imgPath) {
                if (file_exists(public_path($imgPath))) {
                    unlink(public_path($imgPath));
                }
            }
    
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePath = 'product_images/' . uniqid() . '_' . $image->getClientOriginalName();
                $image->move(public_path('product_images'), $imagePath);
                $imagePaths[] = $imagePath;
            }
        }
    
        // Update the product record
        $product->update([
            'name' => $validatedData['name'],
            'category_id' => $request->category_id,
            'brand_id' =>$request->brand_id,
            'price' => $validatedData['price'],
            'stock' => $validatedData['stock'],
            'status' => $validatedData['status'],
            'image' => $thumbnailPath,
            'images' => json_encode($imagePaths), // Convert array back to JSON before saving
            "short_description" => $request->shortdescription,
            'discount_type' => $validatedData['discount_type'] ?? '0',
            'discount_amount' => $validatedData['discount_amount'] ?? 0,
        ]);
    
        // Update the product variant if it exists
        $variant = $product->variants()->first();
        if ($variant) {
            $variant->update([
                'price' => $validatedData['price'],
                'stock' => $validatedData['stock'],
                'image' => $thumbnailPath ?? null,
                'status' => $validatedData['status'],
                'discount_type' => $validatedData['discount_type'] ?? '0',
                'discount_amount' => $validatedData['discount_amount'] ?? 0,
            ]);
        }
    
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }
    
        


    public function destroy(Product $product)
    {
        // Delete images associated with the product
        if (is_string($product->images)) { // Check if images is a string before decoding
            foreach (json_decode($product->images, true) as $imagePath) {
                if (file_exists(public_path($imagePath))) {
                    unlink(public_path($imagePath)); // Remove product image
                }
            }
        }
    
        // Delete related product variants
        foreach ($product->variants as $variant) {
            // Check if variant images exist and delete them
            if (is_string($variant->image)) { // Assuming each variant has a single image
                if (file_exists(public_path($variant->image))) {
                    unlink(public_path($variant->image)); // Remove variant image
                }
            }
    
            // Optionally, if you have multiple images for each variant, you can add:
            if (is_string($variant->images)) {
                foreach (json_decode($variant->images, true) as $variantImagePath) {
                    if (file_exists(public_path($variantImagePath))) {
                        unlink(public_path($variantImagePath)); // Remove additional variant images
                    }
                }
            }
    
            $variant->delete(); // Delete the variant
        }
    
        // Finally, delete the product
        $product->delete();
        
        Supply::where("product_id",$product->id)->delete();
        
    
        return redirect()->route('admin.products.index')->with('success', 'Product and its variants deleted successfully.');
    }
    
    


    public function productDetail($id)
    {
        $product = Product::with(['category', 'subCategory', 'variants', 'supply'])->findOrFail($id);
    
        return view('admin.products.detail', compact('product'));
    }
    public function deleteVariant($variantId)
    {
        // Find the variant to delete
        $variant = ProductVariants::findOrFail($variantId);
    
        // Get the associated product
        $product = $variant->product;
    
        // Subtract the variant's stock from the product's total stock
        $product->stock -= $variant->stock;
        $product->save();
    
        // Delete the variant
        $variant->delete();
    
        return redirect()->back()->with('success', 'Variant deleted and product stock updated successfully.');
    }
    

    public function updateProductV2Varaint(Request $request)
    {
        // Validate inputs
        $validatedData = $request->validate([
            'id' => 'required|exists:product_variants,id', // Ensure the variant exists
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico|max:2048000',
            'discount_type' => 'required|in:0,1,2', // Ensure it's one of the specified types
            'discount_amount' => 'nullable|numeric|min:0', // Optional, but must be numeric if provided
        ]);
    
        // Find the variant by ID
        $variant = ProductVariants::findOrFail($validatedData['id']);
    
        // Process the image if provided
        $imagePath = $variant->image;
        if ($request->hasFile('image')) {
            if ($variant->image && file_exists(public_path($variant->image))) {
                unlink(public_path($variant->image));
            }
    
            $uploadedImage = $request->file('image');
            $imagePath = 'product_images/' . uniqid() . '_' . $uploadedImage->getClientOriginalName();
            $uploadedImage->move(public_path('product_images'), $imagePath);
        }
    
        // Update variant details
        $variant->update([
            "attribute_name" => $request->name,
            "attribute_value" => $request->attribute_value,
            'price' => $validatedData['price'],
            'image' => $imagePath,
            'discount_type' => $validatedData['discount_type'],
            'discount_amount' => $validatedData['discount_amount'] ?? 0,
            "status" => $request->status
        ]);
    
        return redirect()->back()->with('success', 'Variant updated successfully.');
    }

    public function addProductV2VaraintAdd(Request $request){
        $validated = $request->validate([
            'price' => 'required|numeric',
            'discount_type' => 'required|in:0,1,2',
            'discount_amount' => 'nullable|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico|max:204800',
        ]);
    
        $variant = new ProductVariants();
        $variant->product_id = $request->product_id;
        $variant->price = $validated['price'];
        $variant->discount_type = $validated['discount_type'];
        $variant->discount_amount = $validated['discount_amount'];
        $variant->stock = $request->stock;
        $variant->attribute_name = $request->attribute_name;
        $variant->attribute_value = $request->attribute_value;
    
        // Save image if uploaded
        if ($request->hasFile('image')) {
            // Get the uploaded file
            $image = $request->file('image');
            
            // Generate a unique file name with the original extension
            $uniqueName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            
            // Move the image to the public/product_images directory
            $image->move(public_path('product_images'), $uniqueName);
            
            // Save the image path to the variant model
            $variant->image = 'product_images/' . $uniqueName;
        }


    
        $variant->save();
        
        Supply::create([
            "product_id" => $variant->id,
            "varaint_product_id" => $variant->id,
            "type" => 1,
            "qty" => $request->stock,
            "description" => "Product Create",
             "date" => now()->format('Y-m-d'),
        ]);

        // Stock Update
        $product = Product::where("id",$request->product_id)->first();
        $product->stock += $request->stock;
        $product->save();
    
        return redirect()->back()->with('success', 'Variant added successfully!');

    }
    
    
    
}