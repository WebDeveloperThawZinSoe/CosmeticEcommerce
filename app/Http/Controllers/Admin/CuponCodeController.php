<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CuponCode;
use App\Models\CuponUseLog;

class CuponCodeController extends Controller
{
    // Display all coupon codes
    public function index()
    {
        $cupons = CuponCode::orderBy("id", "desc")->get();
        return view("admin.cupon.index", compact("cupons"));
    }

    // Show the create form
    public function create()
    {
        return view("admin.cupon.create");
    }

    // Store a new coupon code
    public function store(Request $request)
    {
        $request->validate([
            'cupon_code' => 'required|string|max:255|unique:cupon_codes,cupon_code',
            'name' => 'required|string|max:255',
            'type' => 'required|integer|in:1,2', // Example: 1 for fixed, 2 for percentage
            'amount' => 'required|integer|min:0',
            'code_limit' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'status' => 'required|integer|in:0,1',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        CuponCode::create($request->all());

        return redirect()->route('admin.cupon.index')->with('status', 'Cupon code created successfully!');
    }

    // Show the edit form
    public function edit($id)
    {
        $cupon = CuponCode::findOrFail($id);
        return view("admin.cupon.edit", compact("cupon"));
    }

    // Update an existing coupon code
    public function update(Request $request, $id)
    {
        $request->validate([
            'cupon_code' => 'required|string|max:255|unique:cupon_codes,cupon_code,' . $id,
            'name' => 'required|string|max:255',
            'type' => 'required|integer|in:1,2',
            'amount' => 'required|integer|min:0',
            'code_limit' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'status' => 'required|integer|in:0,1',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $cupon = CuponCode::findOrFail($id);
        $cupon->update($request->all());

        return redirect()->route('admin.cupon.index')->with('status', 'Cupon code updated successfully!');
    }

    // Delete a coupon code
    public function destroy($id)
    {
        $cupon = CuponCode::findOrFail($id);
        $cupon->delete();

        return redirect()->route('admin.cupon.index')->with('status', 'Cupon code deleted successfully!');
    }

    //show 
    public function show($id){
        $cupon = CuponCode::where("id",$id)->first();   
        $cupon_log = CuponUseLog::where("cupon_id",$id)->get();
        return view("admin.cupon.detail",compact("cupon","cupon_log")); 
    }
}
