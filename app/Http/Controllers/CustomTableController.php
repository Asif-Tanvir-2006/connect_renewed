<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\CustomTable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Laravel\Pail\ValueObjects\Origin\Console;
class CustomTableController extends Controller
{
    public function showResetPwdForm(Request $request)
    {
        
        $email = $request->query('email');
        $token = $request->query('token');
        if (!$email || !$token) {
            return abort(403, 'Unauthorized access.');
        }
        $cacheKey = 'resetPwd_' . $email;
        $cached = Cache::get($cacheKey);
        if (!$cached) {
            return json_encode(["error" => "token expired"]);
        }
        
        if($cached['token'] == $token){
            return view('setpwd', ['token' => $token, 'email' => $email]);
            
        }
        return response()->json(['message' => 'Invalid token.'], 400);
    }
    public function setPwd(Request $request)
    {
        $dat = $request->all();
        $mail = $dat["email"];
        $token = $dat["token"];
        $password = $dat["newPwd"];
        $validator = Validator::make($request->all(), [
            'newPwd' => 'required|string|min:8',
        ]);
        if ($validator->fails()) {
            return json_encode(["error" => "request vaidation"]);
        }
        $cacheKey = 'resetPwd_' . $mail;
        $cached = Cache::get($cacheKey);

        if (!$cached) {
            return json_encode(["error" => "token expired"]);
        }
        if ($cached['token'] == $token) {
            // OTP is correct → save to DB
            $user = CustomTable::where('email', $mail)->first();
            if ($user) {
                $user->password = Hash::make($password);
                $user->save();
                Cache::forget($cacheKey);
                return response()->json(['message' => 'Password updated successfully!']);
            } else {
                return json_encode(["error" => "user not found"]);
            }
        }
        Cache::forget($cacheKey);

        return response()->json(['message' => 'Invalid token.'], 400);
    }
    public function forgotPwd(Request $request)
    {
        $dat = $request->all();
        $mail = $dat["email"];
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'email',
                'regex:/^2024[a-z]{3}\d{3}\.[a-z]+@students\.iiests\.ac\.in$/'

            ],
        ]);
        if ($validator->fails()) {
            return json_encode(["error" => "request vaidation"]);
        }
        $user = CustomTable::where('email', $mail)->first();
        if(!$user) {
            return json_encode(["error" => "user not found"]);
        }
        $token = Str::random(64);
        $resetLink = "https://connect-renewed.vercel.app/setpwd?token=$token&email=$mail";

        // $pathVar = env('PYTHON_SERVER_PATH');
        // $email_valid_response = Http::get("$pathVar?email=$mail");
        // $data = $email_valid_response->json();

        // if ($data["email"] == "exist") {
        //     //do shit
        // } else if ($data["email"] == "not exist") {
        //     return json_encode(["email" => "not exist"]);
        // } else {
        //     return json_encode(["email" => "api end point not working as intended"]);
        // }
        // return response()->json('The random token is: ' . $token);
        $cacheKey = 'resetPwd_' . $mail;
        Cache::put($cacheKey, [
            // 'email' => $mail,
            'token' => $token,
        ], now()->addMinutes(10));
       
        $apiKey = env('BREVO_API_KEY');

        $response = Http::withHeaders([
            'accept' => 'application/json',
            'api-key' => $apiKey,
            'content-type' => 'application/json',
        ])->post('https://api.brevo.com/v3/smtp/email', [
                    'sender' => [
                        'name' => 'Introxx',
                        'email' => 'asiftanvir2006@gmail.com',
                    ],
                    'to' => [
                        ['email' => $mail],
                    ],
                    'subject' => 'Your Password reset link',
                    'htmlContent' => "<html><body><h3>Follow this link to reset password: <br> <a href=\"{$resetLink}\" style=\"color: #1a73e8; text-decoration: underline;\">{$resetLink}</a><br>Please don't share it with others. <br>It is valid for 10 minutes only.</h3></body></html>",
                ]);

        if ($response->failed()) {
            return response()->json(['error' => 'Failed to send OTP email.'], 500);
        }
        return response()->json(['message' => 'Password reset link sent to your email!']);

    }
    public function sendOtp(Request $request)
    {
        $ip = explode(',', $request->header('X-Forwarded-For'))[0] ?? $request->ip();
        $cacheKey = 'signup_attempts_' . $ip;

        // Check if IP is blocked
        if (Cache::has("blocked_ip_$ip")) {
            return response()->json(['message' => 'Too many attempts. Try again in 24 hours.'], 429);
        }

        // Track attempts
        $attempts = Cache::get($cacheKey, 0);
        if ($attempts >= 5) {
            Cache::put("blocked_ip_$ip", true, now()->addDay()); // Block for 1 day
            Cache::forget($cacheKey); // Reset count after blocking
            return response()->json(['message' => 'Too many attempts. You are blocked for 24 hours.'], 429);
        }

        Cache::put($cacheKey, $attempts + 1, now()->addDay());

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'unique:custom_table,email',
                'regex:/^2024[a-z]{3}\d{3}\.[a-z]+@students\.iiests\.ac\.in$/'
            ],
            'password' => 'required|string|min:8',
        ]);
        // 'regex:/^[\w\.-]+@students\.iiests.ac\.in$/'
        if ($validator->fails()) {
            /*return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();*/
            return json_encode(["error" => "request vaidation"]);
        }
        // well this shit failed badly
        $dat = $request->all();
        $x = $dat["email"];
        $pathVar = env('PYTHON_SERVER_PATH');
        $email_valid_response = Http::get("$pathVar?email=$x");
        $data = $email_valid_response->json();

        if ($data["email"] == "exist") {
            //do shit
        } else if ($data["email"] == "not exist") {
            return json_encode(["email" => "not exist"]);
        } else {
            return json_encode(["email" => "api end point not working as intended"]);
        }


        // Generate a 6-digit OTP
        $otp = rand(100000, 999999);

        // Cache user data temporarily (10 minutes)
        $key = 'otp_' . $request->email;
        Cache::put($key, [
            'otp' => $otp,
            'name' => $request->name,
            'email' => $request->email,
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
                        'name' => 'Introxx',
                        'email' => 'asiftanvir2006@gmail.com',
                    ],
                    'to' => [
                        ['email' => $request->email],
                    ],
                    'subject' => 'Your OTP for Connect Signup',
                    'htmlContent' => "<html><body><h3>Your OTP is: <strong>{$otp}</strong><br>Please don't share it with others. <br>It is valid for 10 minutes only.</h3></body></html>",
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
