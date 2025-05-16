<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\CustomTable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class CustomTableController extends Controller
{
    public function sendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:custom_table,email',
            'password' => 'required|string|min:8',
        ]);
        //'regex:/^[\w\.-]+@students\.iiests.ac\.in$/'
        if ($validator->fails()) {
            /*return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();*/
            return json_encode(["error"=>"request vaidation"]);
        }
        $dat = $request->all();
        $x = $dat["email"];
        $pathVar = env('PYTHON_SERVER_PATH');
        $email_valid_response = Http::get("$pathVar?email=$x");
        $data = $email_valid_response->json();

        if($data["email"]=="exist"){
            //do shit
        }
        else if($data["email"]=="not exist"){
            return json_encode(["email"=>"not exist"]);
        }
        else{
            return json_encode(["email"=>"api end point not working as intended"]);
        }
        
        // Generate a 6-digit OTP
        $otp = rand(100000, 999999);

        // Cache user data temporarily (10 minutes)
        $key = 'otp_' . $request->email;
        Cache::put($key, [
            'otp'      => $otp,
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password,
        ], now()->addMinutes(10));

        // Send email using Brevo API
        $apiKey = env('BREVO_API_KEY');

        $response = Http::withHeaders([
            'accept' => 'application/json',
            'api-key' => $apiKey,
            'content-type' => 'application/json',
        ])->post('https://api.brevo.com/v3/smtp/email', [
            'sender' => [
                'name'  => 'ConnectTeam',
                'email' => 'asiftanvir2006@gmail.com',
            ],
            'to' => [
                ['email' => $request->email],
            ],
            'subject' => 'Your OTP for Connect Signup',
            'htmlContent' => "<html><body><h1>Your OTP is: <strong>{$otp}</strong></h1></body></html>",
        ]);

        if ($response->failed()) {
            return response()->json(['error' => 'Failed to send OTP email.'], 500);
        }

        return view('verify', ['email' => $request->email]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:6',
        ]);

        $cached = Cache::get('otp_' . $request->email);

        if (!$cached) {
            return response()->json(['message' => 'OTP expired or not found.'], 422);
        }

        if ($cached['otp'] == $request->otp) {
            // OTP is correct → save to DB
            $user = CustomTable::create([
                'name' => $cached['name'],
                'email' => $cached['email'],
                'password' => Hash::make($cached['password']),
            ]);

            // Clear OTP
            Cache::forget('otp_' . $request->email);

            return response()->json(['message' => 'Email verified and user registered!', 'user' => $user]);
        }

        return response()->json(['message' => 'Invalid OTP.'], 400);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = CustomTable::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['user_id' => $user->id]);
            return response()->json(['message' => 'Logged in successfully!']);
        }

        return response()->json(['message' => 'Invalid credentials.']);
    }
}
