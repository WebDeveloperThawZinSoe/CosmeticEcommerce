<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        $faqs = FAQ::all();
        return view('admin.faq.index', compact('faqs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        FAQ::create($request->all());

        return redirect()->route('admin.faq.index')->with('success', 'FAQ created successfully.');
    }

    public function update(Request $request, FAQ $faq)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq->update($request->all());

        return redirect()->route('admin.faq.index')->with('success', 'FAQ updated successfully.');
    }

    public function destroy(FAQ $faq)
    {
        $faq->delete();

        return redirect()->route('admin.faq.index')->with('success', 'FAQ deleted successfully.');
    }
}
