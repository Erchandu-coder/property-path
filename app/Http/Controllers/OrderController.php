<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription; // Add this
use Illuminate\Support\Carbon; // (at the top if not already)
use Illuminate\Support\Str;


class OrderController extends Controller
{
    //
    public function subscribe()
    {
        $user = Auth::user();
        $pstatus = Subscription::where('user_id', $user->id)->latest('created_at')->first();
        $exists = Subscription::where('user_id', $user->id)->where('payment_status', 'failed')->exists();
        return view('user-admin.order', compact('user', 'pstatus', 'exists'));
    }
    public function createSubscribe(Request $request)
    {
        
        $userId = $request->user_id;
        // if($request->plan_type == 3)
        // {
        //         $request->validate([
        //         'plan_type' => ['required', 'numeric'],
        //         'price' => ['required', 'numeric'],
        //         'mobile_number' => ['required', 'digits:10'],
        //     ]);
        // }else{
        //         $request->validate([
        //         'plan_type' => ['required', 'numeric'],
        //         'price' => ['required', 'numeric'],
        //         'mobile_number' => ['required', 'digits:10'],
        //         'payment_receipt' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        //     ]);
            
        // }
        $rules = [
            'plan_type' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'mobile_number' => ['required', 'digits:10'],
        ];

        if ($request->plan_type != 3) {
            $rules['payment_receipt'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:2048';
        }

        $request->validate($rules);
        
        if ($request->file('payment_receipt')) {
            $file = $request->file('payment_receipt');

            $fileName = time().'_'.$file->getClientOriginalName(); // Unique file name
            $filePath = $file->storeAs('uploads', $fileName, 'public');
            // Step 3: Save file name in DB
        }
            if($request->plan_type == 3)
            {
                $orderId = 'Trail-'.$userId.now()->format('YmdHis').strtoupper(Str::random(4)).rand(1000, 9999);            

            }else{
                $orderId = 'ORD-'.$userId.now()->format('YmdHis').strtoupper(Str::random(4)).rand(1000, 9999);

            }   
            if ($request->plan_type == 3) {
                $expire_date = \Carbon\Carbon::now()->addDays(3)->toDateString();
            }
            if($request->plan_type == 6)
            {
                $expire_date = Carbon::now()->addMonths(6)->toDateString();
            }
            if($request->plan_type == 12)
            {
                $expire_date = Carbon::now()->addYear()->toDateString();
            }

            $pstatus = Subscription::create([
                'user_id'=>$request->user_id,
                'order_id' => $orderId,
                'mobile_number' => $request->mobile_number,
                'payment_receipt' => $fileName,
                'plan_type' => $request->plan_type,
                'price' => $request->price,
                'plan_renew_date' => Carbon::now(),
                'plan_expire_date' => $expire_date,
                'payment_status' => 'pending'
            ]);
            if ($pstatus) {
                return redirect()->back()->with('message', "We've received your payment request and it's now under review. We'll notify you once it's approved.");
            } else {
                return redirect()->back()->with('error', 'Something went wrong!');
            } 

    }
    public function subScriptionDetails()
    {
        $user = Auth::user();
        $p_status = Subscription::where('user_id', $user->id)->first();
        return view('user-admin.subscription-details', compact('user', 'p_status'));
    }
}