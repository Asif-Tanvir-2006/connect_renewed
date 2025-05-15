<!-- verify.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/Asif-Tanvir-2006/connect_renewed@main/public/css/verify.css">
    <link href="{{ asset('css/verify.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Verify OTP</title>
</head>

<body>
    <div class="view">
        <div class="padder">
        </div>
        <div class="box">
            <div class="wrapper">
                <div class="caption">
                    <h3>Enter your OTP</h3>
                </div>
                <form action="{{ url('/register/verify-otp') }}" method="POST">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email }}">
                    <div class="lower"><input type="text" name="otp" required></div>

                    <button type="submit">Verify</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>