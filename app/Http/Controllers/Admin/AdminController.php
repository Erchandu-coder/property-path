<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Property;
use App\Models\ContactUs;

class AdminController extends Controller
{

    public function dashboard()
    {
        $current = Carbon::now('Asia/Kolkata');
        $formatted = $current->format('d-m-Y h:i A');
        $total_user = User::count();
        $active_user = User::where('status', 1)->count();
        $total_value = Subscription::where('payment_status', 'completed')
                           ->whereNotNull('price')
                           ->sum('price');
        $total_count = Property::where('status', 1)->count();
        $rr_count = Property::where('status', 1)->where('property_type_id', 1)->count();
        $rs_count = Property::where('status', 1)->where('property_type_id', 2)->count();
        $cr_count = Property::where('status', 1)->where('property_type_id', 3)->count();
        $cs_count = Property::where('status', 1)->where('property_type_id', 4)->count();
        $contact_data = ContactUs::orderBy('created_at', 'desc')->get();
        return view('admin.dashboard', compact(['formatted', 'total_user', 'active_user', 'total_value', 'total_count', 'rr_count', 'rs_count', 'cr_count', 'cs_count', 'contact_data']));
    }
    
    public function showUser()
    {
        $results = User::all();
        return view('admin.all-user-list', compact('results'));
    }
    
    public function editUser($id)
    {
        $user = User::find($id);
       return view('admin.edit-users', compact('user'));
    } 
    public function updateUser(Request $request)
    {
           // Validate input data
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email,' . $request->id,
            'gender'    => 'required|in:Male,Female',
            'dob'       => 'required|date',
            'mobile'    => 'required|digits:10',
            'address'   => 'nullable|string|max:255',
            'state'     => 'required|string',
            'pincode'   => 'required|digits:6',
            'city'      => 'required|string|max:100',
            'country'   => 'required|string|max:100',
            'status'    => 'required|in:0,1',
        ]);

        // Find the user by ID
        $user = User::findOrFail($request->id);

        // Update user data
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->gender   = $request->gender;
        $user->dob      = $request->dob;
        $user->mobile   = $request->mobile;
        $user->address  = $request->address;
        $user->state    = $request->state;
        $user->pincode  = $request->pincode;
        $user->city     = $request->city;
        $user->country  = $request->country;
        $user->status   = $request->status;

        // Save changes
        $data = $user->save();
        if ($data) {
            return redirect()->back()->with('message', 'User updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }   
    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $data = $user->delete();
        if ($data) {
            return redirect()->back()->with('message', 'User deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }  
    }
    public function orderIndex()
    {
        $results = Subscription::with('user')->orderBy('id', 'DESC')->get();
        return view('admin.orderlist', compact('results'));
    }

    public function approvePayment(Request $request)
    {
        $result = Subscription::findOrFail($request->payment_id);
        $result->payment_status = $request->payment_status;
        $data = $result->save();
        if ($data) {
            return redirect()->back()->with('message', 'Payment updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }   
    }
    public function updateUserStatus(Request $request)
    {
        $item = User::find($request->id);
        if ($item) {
            $item->status = $request->status;
            $item->save();

            return response()->json(['message' => 'User Status updated successfully.']);
        }

        return response()->json(['message' => 'Item not found.'], 404);
    }
    public function trailSubscribe(Request $request)
    {
        $userId = $request->user_id;
        $trail_day = (int) $request->trail_day;
        $now_date = Carbon::now()->toDateString();
        $existingSubscription = Subscription::where('user_id', $userId)
        ->where('payment_status', 'completed')
        ->where('plan_expire_date', '>=', $now_date)
        ->first();

        if ($existingSubscription) {
            return redirect()->back()->with('message', 'You already have an active subscription.');
        }

        $orderId = 'Trail-'.$userId.now()->format('YmdHis').strtoupper(Str::random(4)).rand(1000, 9999);
        $pstatus = Subscription::create([
            'user_id'=>$request->user_id,
            'order_id' => $orderId,
            'mobile_number' => '',
            'payment_receipt' => '',
            'plan_renew_date' => Carbon::now(),
            'plan_expire_date' => Carbon::now()->addDays($trail_day)->toDateString(),
            'payment_status' => 'completed'
        ]);
            
        if ($pstatus) {
            return redirect()->back()->with('message', "Trail Successfully created.");
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        } 

    }
}