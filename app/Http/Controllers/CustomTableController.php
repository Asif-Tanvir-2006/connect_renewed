<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\CustomTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CustomTableController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:custom_table,email',
            'password' => 'required|string|min:8',
        ]);

        // Create a new record in the custom_table
        $data = CustomTable::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Return a response
        return response()->json(['message' => 'Data saved successfully!', 'data' => $data]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = CustomTable::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Log the user in (using session)
            session(['user_id' => $user->id]); // or Auth::login($user) if you set up guards
            return response()->json(['message' => 'logged in  successfully!']);
        }

        return response()->json(['message' => 'Does not exist or data mismatch']);

    }
}
