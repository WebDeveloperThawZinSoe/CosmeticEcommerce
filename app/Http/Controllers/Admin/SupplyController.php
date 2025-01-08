<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariants;
use App\Models\Supply;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplies = Supply::orderBy("id","desc")->get();
        return view("admin.supply.index",compact("supplies"));
    }
    


    public function managment_1($id){
        $system_type = null;
        $product_id = $id;
        $product = Product::where("id",$id)->first();
        $supply = Supply::where("product_id",$id)->orderBy("id","desc")->get();
        return view("admin.products.stock_v1",compact("system_type","product","supply","product_id"));
    }

    public function managment_2($id){
        $system_type = 2;
        $product_id = $id;
        $product = ProductVariants::where("id",$id)->first();
        $supply = Supply::where("varaint_product_id",$id)->orderBy("id","desc")->get();
        return view("admin.products.stock_v1",compact("product","supply","product_id","system_type"));
    }

    public function managment_Post(Request $request)
    {
        // Validate the request
        $request->validate([
            'vproduct_id' => 'required|exists:product_variants,id',
            'stock_type' => 'required|in:1,2', // 1: Add Stock, 2: Reduce Stock
            'quantity' => 'required|integer|min:1',
            'description' => 'nullable|string|max:255',
        ]);

        // Fetch the variant product
        $variantProduct = ProductVariants::findOrFail($request->vproduct_id);
        $product = $variantProduct->product; // Assuming a relationship exists between ProductVariants and Product

        // Calculate new stock based on the stock type
        $newStock = $product->stock;
        if ($request->stock_type == 1) {
            $newStock += $request->quantity; // Add Stock
        } elseif ($request->stock_type == 2) {
            if ($product->stock < $request->quantity) {
                return back()->withErrors(['quantity' => 'Not enough stock available to reduce.']);
            }
            $newStock -= $request->quantity; // Reduce Stock
        }



        // Update the product stock
        $product->update(['stock' => $newStock]);

        $newStock = $variantProduct->stock;
        if ($request->stock_type == 1) {
            $newStock += $request->quantity; // Add Stock
        } elseif ($request->stock_type == 2) {
            // if ($product->stock < $request->quantity) {
            //     return back()->withErrors(['quantity' => 'Not enough stock available to reduce.']);
            // }
            $newStock -= $request->quantity; // Reduce Stock
        }
         // Update the product stock
         $variantProduct->update(['stock' => $newStock]);
         
        // Create a new supply log
        Supply::create([
            'product_id' => $product->id,
            'varaint_product_id' => $variantProduct->id,
            'type' => $request->stock_type,
            'qty' => $request->quantity,
            'description' => $request->description,
            'date' => now(),
        ]);

        // Redirect back with a success message
        return redirect()
            ->back()
            ->with('success', 'Stock updated successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
