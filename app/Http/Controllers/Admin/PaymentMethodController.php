<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethod::all();
        return view('admin.paymentmethod.index', compact('paymentMethods'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'method_name' => 'required|string|max:255',
            'account_no' => 'required|string|max:255',
            'account_name' => 'required|string|max:255',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            "country" => "required"
        ]);

        $data = $request->all();

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/payment_method'), $filename);
            $data['icon'] = $filename;
        }

        PaymentMethod::create($data);

        return redirect()->route('admin.payment_method.index')->with('success', 'Payment Method created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'method_name' => 'required|string|max:255',
            'account_no' => 'required|string|max:255',
            'account_name' => 'required|string|max:255',
            'icon' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            "country" => "required"
        ]);

        $paymentMethod = PaymentMethod::find($id);
        $data = $request->all();

        if ($request->hasFile('icon')) {
            // Delete old icon if it exists
            $oldIcon = public_path('images/payment_method/' . $paymentMethod->icon);
            if (File::exists($oldIcon)) {
                File::delete($oldIcon);
            }

            $file = $request->file('icon');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/payment_method'), $filename);
            $data['icon'] = $filename;
        }

        $paymentMethod->update($data);

        return redirect()->route('admin.payment_method.index')->with('success', 'Payment Method updated successfully.');
    }

    public function destroy($id)
    {
        $paymentMethod = PaymentMethod::find($id);
    
        if ($paymentMethod) {
            // Delete the icon file if it exists
            $iconPath = public_path('images/payment_method/' . $paymentMethod->icon);
            if (File::exists($iconPath)) {
                File::delete($iconPath);
            }
    
            // Delete the payment method record
            $paymentMethod->delete();
    
            return redirect()->route('admin.payment_method.index')->with('success', 'Payment Method deleted successfully.');
        } else {
            return redirect()->route('admin.payment_method.index')->with('error', 'Payment Method not found.');
        }
    }
    

}