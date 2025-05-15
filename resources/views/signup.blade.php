<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{ asset('css/signup.css') }}" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>

<body>
    <div class="view">
        <div class="padder"></div>
        <div class="box">
            <div class="wrapper">

            <form action="{{ url('/register/send-otp') }}" method="POST">
                    @csrf

                    <div class="caption">Username</div>
                    <div class="upper">
                        <input type="text" name="name" required>
                    </div>

                    <div class="caption">G-Suite Id</div>
                    <div class="lower">
                        <input type="email" name="email" required>
                    </div>

                    <div class="caption">Password</div>
                    <div class="lower">
                        <input type="password" name="password" required>
                    </div>

                    <button type="submit">Sign Up</button>
                </form>

                <div class="cap">Already Registered? <a href="/login"> Sign In</a></div>
            </div>
        </div>
    </div>
</body>

</html>