<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VIPRequest; // Assuming there's a model for handling the requests
use Illuminate\Support\Facades\Auth;

class VIPRequestController extends Controller
{
    /**
     * Store a newly created VIP request in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'id' => 'required|integer|exists:types,id', // Assuming 'types' is the table where type data is stored
        ]);

        // Create a new VIP Request
        $vipRequest = new VIPRequest();
        $vipRequest->user_id = Auth::id();  // Assuming the user is authenticated
        $vipRequest->type_id = $request->input('id');
        $vipRequest->status = 0;  // Initial status (e.g. 0 = Pending)
        $vipRequest->comment = $request->input('comment');  // Optional comment field
        $vipRequest->save();

        // Redirect with a success message
        return redirect()->back()->with('success', 'VIP request submitted successfully.');
    }


}
