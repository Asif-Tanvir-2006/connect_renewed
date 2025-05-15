<!-- verify.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <meta charset="UTF-8">
    <title>Verify OTP</title>
</head>

<body>
        <div class="grid-pattern"></div>

    <!-- Blob Background Elements -->
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>

    <nav class="backdrop-blur-md   fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
           

                <!-- Desktop Menu -->
              



                <!-- Mobile menu button -->
                
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="md:hidden hidden bg-dark-800 border-t border-dark-700">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="/"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-cyan-400 hover:bg-dark-700">Home</a>

                <a href="#"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-cyan-400 hover:bg-dark-700">About</a>
               
            </div>
        </div>
    </nav>

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