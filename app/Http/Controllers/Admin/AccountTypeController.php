<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\CustomerType;

class AccountTypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('admin.accountTypes.index', compact('types'));
    }

    public function create()
    {
        return view('admin.accountTypes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'discount_amount' => 'required|numeric',
            'icon' => 'required|file|mimes:jpg,png,jpeg,gif|max:2048'
        ]);

        $iconFile = $request->file('icon');
        $iconName = Str::random(10) . '.' . $iconFile->getClientOriginalExtension(); // Unique file name
        $iconPath = $iconFile->move(public_path('icons'), $iconName); // Save in public/icons

        Type::create([
            'name' => $request->name,
            'discount_amount' => $request->discount_amount,
            'icon' => 'icons/' . $iconName, // Store relative path
            "amount_limit" => $request->limit
        ]);

        return redirect()->route('admin.account_types.index')->with('status', 'Account Type created successfully!');
    }

    public function show(Type $account_type)
    {
        return view('admin.accountTypes.show', compact('account_type'));
    }

    public function edit(Type $account_type)
    {
        return view('admin.accountTypes.edit', compact('account_type'));
    }

    public function update(Request $request, Type $account_type)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'discount_amount' => 'required|numeric',
            'icon' => 'nullable|file|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $account_type->name = $request->name;
        $account_type->discount_amount = $request->discount_amount;
        $account_type->amount_limit = $request->limit;
        if ($request->hasFile('icon')) {
            // Delete the old icon if it exists
            if (file_exists(public_path($account_type->icon))) {
                unlink(public_path($account_type->icon));
            }

            $iconFile = $request->file('icon');
            $iconName = Str::random(10) . '.' . $iconFile->getClientOriginalExtension(); // Unique file name
            $iconPath = $iconFile->move(public_path('icons'), $iconName); // Save in public/icons
            $account_type->icon = 'icons/' . $iconName; // Store relative path
        }

        $account_type->save();

        return redirect()->route('admin.account_types.index')->with('status', 'Account Type updated successfully!');
    }

    public function destroy(Type $account_type)
    {
        // Delete the icon if it exists
        if (file_exists(public_path($account_type->icon))) {
            unlink(public_path($account_type->icon));
        }

        $account_type->delete();

        return redirect()->route('admin.account_types.index')->with('status', 'Account Type deleted successfully!');
    }

    public function updateVIPRequest(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|integer',
            'comment' => 'nullable|string',
        ]);

        // Find the VIP request by ID
        $VIPRequest = \App\Models\VIPRequest::findOrFail($id);
        
        // Update the status and comment
        $VIPRequest->update([
            'status' => $request->status,
            'comment' => $request->comment,
        ]);
        if($request->status == 1){
            CustomerType::where("user_id",$VIPRequest->user_id)->update([
                "type_id" => $VIPRequest->type_id,
            ]);
        }


        return redirect()->back()->with('status', 'VIP request updated successfully!');
    }

}
