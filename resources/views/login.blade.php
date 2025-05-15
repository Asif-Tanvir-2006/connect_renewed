<!DOCTYPE html>
<html lang="en">

<head>
    <!-- The order in which link rel is defined for both is very important. -->

    <link href="{{ asset('css/login.css') }}" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="view">
        <div class="padder">

        </div>
        <div class="box">
            <div class="wrapper">
                <form method="POST" action="/login">
                    @csrf
                    <div class="caption">G-Suite Id</div>
                    <div class="upper">
                        <input type="text" name="email" id="">
                    </div>
                    <div class="caption">Password</div>
                    <div class="lower">
                        <input type="text" name="password" id="">
                    </div>
                    <button>Sign In</button>
                    <div class="cap">Not Registered Yet? <a href="signup"> Sign Up</a></div>

                </form>
            </div>

        </div>
    </div>
</body>

</html>