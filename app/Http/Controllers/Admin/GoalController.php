<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Goal;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $goals = Goal::orderBy("id","desc")->get();
        return view("admin.goal.index",compact("goals"));
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
      
        $categories = $request->category;
        foreach($categories as $category){
            Goal::create([
                "name" => $request->name,
                "product_category_id" => $category
            ]);
        }
       

        return redirect()->back()->with('success', 'Goal created successfully.');
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
    public function update(Request $request, $name)
    {
        
       // Delete all previous categories for this goal name
        Goal::where('name', $request->name)->delete();
    
        // Insert updated categories
        $categories = $request->category;
        foreach ($categories as $category) {
            Goal::create([
                'name' => $request->name,
                'product_category_id' => $category
            ]);
        }
    
        return redirect()->route('admin.goal.index')->with('success', 'Goal updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $name)
    {
        // Find and delete all goals with the specified name
        Goal::where('name', $name)->delete();
    
        return redirect()->back()->with('success', 'Goal(s) deleted successfully.');
    }
    
}
