<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AdminController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard');
    }
    
    public function showUser()
    {
        $results = User::paginate(10);
        return view('admin.all-user-list', compact('results'));
    }
    
    public function editUser($id)
    {
        $user = User::find($id);
       return view('admin.update-users', compact('user'));
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

}