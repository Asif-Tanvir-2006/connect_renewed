<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestMail extends Controller
{
    public function sendMail()
    {
        $apiKey = env('BREVO_API_KEY');

        $response = Http::withHeaders([
            'api-key' => $apiKey,
            'Content-Type' => 'application/json',
        ])->post('https://api.brevo.com/v3/smtp/email', [
            'sender' => [
                'name' => 'introxx_iiest',
                'email' => 'asiftanvir2006@gmail.com', // must be a Brevo-verified sender
            ],
            'to' => [
                ['email' => 'asiftanvir2006@gmail.com'],
            ],
            'subject' => 'Test Email',
            'htmlContent' => '<h1>Hello from Brevo API!</h1><p>This is a test.</p>',
        ]);

        return response()->json([
            'status' => $response->status(),
            'body' => $response->json(),
        ]);
    }
}
