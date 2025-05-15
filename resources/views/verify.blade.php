<!-- verify.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify OTP</title>
</head>
<body>
    <h2>Enter OTP</h2>
    <form action="{{ url('/register/verify-otp') }}" method="POST">
        @csrf
        <input type="hidden" name="email" value="{{ $email }}">
        <label for="otp">OTP:</label>
        <input type="text" name="otp" required>
        <button type="submit">Verify</button>
    </form>
</body>
</html>