<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription; // Add this
use Illuminate\Support\Carbon; // (at the top if not already)


class OrderController extends Controller
{
    //
    public function subscribe()
    {
        $user = Auth::user();
        return view('user-admin.order', compact('user'));
    }
    public function createSubscribe(Request $request)
    {
        dd($request);
        $request->validate([
            'mobile_number' => ['required', 'digits:10'],
            'payment_receipt' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);
        if ($request->file('payment_receipt')) {
            $file = $request->file('payment_receipt');

            $fileName = time().'_'.$file->getClientOriginalName(); // Unique file name
            $filePath = $file->storeAs('uploads', $fileName, 'public');
            // Step 3: Save file name in DB
            Subscription::create([
                'user_id'=>$request->id,
                'mobile_number' => $request->mobile_number,
                'payment_receipt' => $fileName,
                'plan_renew_date' => Carbon::now(),
            ]);
        }

    }
}
