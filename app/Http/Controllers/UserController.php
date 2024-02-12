<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\City;
use App\Http\Middleware\AdminMiddleware;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $users = User::all(); // Retrieve all users from the users table
        return view('users.index', ['users' => $users]); // Pass users data to the view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $cities = City::all();
        return view('users.create', ['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
     public function store(Request $request)
     {
         // Validate the request data
         $request->validate([
            
                'name' => 'required|string|max:255',
                'mobile_number' => 'required|string|unique:users,mobile_number|digits:10',
                'ref_mobile_number' => 'required|string|exists:users,mobile_number,digits:10',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'user_role' => 'required|integer|in:0,1,2,3,4,5,6,7,8,9,10', // Use the allowed integer values
                'city' => 'required|integer|exists:cities,id', // Use the allowed integer values    
                'gst_no' => 'nullable|string|max:255',
            ]);
    
            // Create the new user
            // Create a new user instance
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile_number' => $request->mobile_number,
            'ref_mobile_number' => $request->ref_mobile_number,
            'city' => $request->city,
            'user_role' => $request->user_role,
            'gst_no' => $request->gst_no,
        ]);
    
            // You can redirect the user wherever you want after creation
            return redirect()->route('users.create')->with('success', 'User created successfully!');
        }
    

    public function show($id)
    {
        $user = User::findOrFail($id); // Find user of id = $id
        $users = User::all();
        $Refname = User::where('mobile_number', $user->ref_mobile_number)->get();
        return view('users.show', ['user' => $user, 'users' => $users, 'Refname' => $Refname]);
    }

    public function getReferralName(Request $request)
{
    $referralMobileNumber = $request->input('referralMobileNumber');
    $referralUser = User::where('mobile_number', $referralMobileNumber)->first();

    return response()->json(['name' => $referralUser ? $referralUser->name : null]);

}
    

    public function edit($id)
    {
        $user = User::findOrFail($id); // Find user of id = $id
        $cities = City::all();
        return view('users.edit', ['user' => $user, 'cities' => $cities]);
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'mobile_number' => 'required|integer|unique:users,mobile_number,'.$id,
            'user_role' => 'required|integer|in:0,1,2,3,4,5,6,7,8,9,10', // Use the allowed integer values
            'city' => 'required|string|max:255',
            'gst_no' => 'nullable|string|max:255',
        ]);

        // Update the user
        $user = User::findOrFail($id); // Find user of id = $id
        $user->update($validatedData);

        // You can redirect the user wherever you want after updation
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id); // Find user of id = $id
        $user->delete();

        // You can redirect the user wherever you want after deletion
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }   

    public function roles($id)
    {
        $users = User::all(); // Retrieve all users from the users table
        $user = User::findOrFail($id); // Find user of id = $id
        return view('users.roles', ['users' => $users, 'user' => $user]); // Pass users data to the view
    }

    public function roleUpdate(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'user_role' => 'required|integer|in:0,1,2,3,4,5,6,7,8,9,10', // Use the allowed integer values
        ]);

        // Update the user
        $user = User::findOrFail($id); // Find user of id = $id
        $user->update($validatedData);

        // You can redirect the user wherever you want after updation
        return redirect()->route('users.roles')->with('success', 'User role updated successfully!');
    }
}

