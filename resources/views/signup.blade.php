<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Sign Up</title>
</head>

<body>
    <div class="grid-pattern"></div>

    <!-- Blob Background Elements -->
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>

    <nav class="backdrop-blur-md   fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <div class="flex items-center">
                        <!-- <div class="w-8 h-8 rounded-full bg-cyan-500 flex items-center justify-center mr-2">
                        <i class="fas fa-atom text-dark-900 text-lg"></i>
                    </div> -->
                        <span class="text-cyan-400 font-bold text-xl font-mono">INTROXX 2k25</span>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex flex-1 justify-end">
                    <div class="flex items-baseline space-x-8 mr-0">
                        <a href="/"
                            class="nav-link relative px-3 py-2 text-sm font-medium text-gray-300 hover:text-cyan-400 transition-colors duration-300">Home</a>
                        <a href="#"
                            class="nav-link relative px-3 py-2 text-sm font-medium text-gray-300 hover:text-cyan-400 transition-colors duration-300">About</a>
                    </div>
                </div>



                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button id="mobileMenuButton" class="text-gray-300 hover:text-cyan-400 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
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
                        <input type="text" name="email" required>
                    </div>

                    <div class="caption">Password</div>
                    <div class="lower">
                        <input type="password" name="password" required>
                    </div>

                    <button>Sign Up</button>
                </form>

                <div class="cap">Already Registered? <a href="/login"> Sign In</a></div>
            </div>
        </div>
    </div>
</body>
<script>
    // Loading screen animation
    window.addEventListener('load', function () {
        setTimeout(function () {
            const loadingScreen = document.getElementById('loadingScreen');
            loadingScreen.style.opacity = '0';
            setTimeout(function () {
                loadingScreen.style.display = 'none';
            }, 500);
        }, 1500);
    });

    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const mobileMenu = document.getElementById('mobileMenu');

    mobileMenuButton.addEventListener('click', function () {
        mobileMenu.classList.toggle('hidden');
    });

    // Add floating animation to elements
    document.addEventListener('DOMContentLoaded', function () {
        const elements = document.querySelectorAll('.animate-float');
        elements.forEach((el, index) => {
            // Apply different animation delays
            el.style.animationDelay = `${index * 0.2}s`;
        });
    });

    // Button hover effect enhancement
    const cyberButtons = document.querySelectorAll('.btn-cyber');
    cyberButtons.forEach(button => {
        button.addEventListener('mouseenter', function () {
            this.style.boxShadow = '0 0 15px rgba(34, 211, 238, 0.5)';
        });
        button.addEventListener('mouseleave', function () {
            this.style.boxShadow = 'none';
        });
    });
</script>

</html>