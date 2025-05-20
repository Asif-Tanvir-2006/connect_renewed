<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href={{  asset('css/about.css') }}>
    <link rel="icon" type="image/x-icon" href="/static/favicon.ico">
    <script src="https://cdn.tailwindcss.com"></script>

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
                        <span class="text-cyan-400 Ub_font">INTRO <span style="margin-left: -5px">XX</span> <span
                                style="margin-left: 5px;">2K25</span></span>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="#"
                            class="nav-link relative px-3 py-2 text-sm font-medium text-gray-300 hover:text-cyan-400 transition-colors duration-300">Home</a>
                        <a href="#"
                            class="nav-link relative px-3 py-2 text-sm font-medium text-gray-300 hover:text-cyan-400 transition-colors duration-300">About</a>

                    </div>
                </div>

                <!-- Auth Buttons -->
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6 space-x-4">
                        <a href="/login"
                            class="px-4 py-2 rounded-md text-cyan-400 border border-cyan-400 hover:bg-cyan-400/10 transition-colors duration-300 font-medium">Login</a>
                        <a href="/signup"
                            class="btn-cyber px-4 py-2 rounded-md bg-cyan-500 text-dark-900 font-medium hover:bg-cyan-400 transition-colors duration-300">Sign
                            Up</a>
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
                <a href="#"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-cyan-400 hover:bg-dark-700">Home</a>
                <a href="#"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-cyan-400 hover:bg-dark-700">About</a>

                <div class="pt-2 space-y-2">
                    <button
                        class="w-full px-3 py-2 rounded-md text-center text-cyan-400 border border-cyan-400 hover:bg-cyan-400/10">Login</button>
                    <button
                        class="w-full px-3 py-2 rounded-md text-center bg-cyan-500 text-dark-900 font-medium hover:bg-cyan-400">Sign
                        Up</button>
                </div>
            </div>
        </div>
    </nav>


    <div class="padder"></div>
    <div class="container">
        <div class="team-grid">
            <div class="team-member">
                <img src="https://raw.githubusercontent.com/Asif-Tanvir-2006/MentL/refs/heads/main/static/asif.png"
                    alt="asif">

                <h3>SK Asif Tanvir</h3>
                <p class="role">Lead Backend Dev</p>
                <p>Visionary leader driving innovation and smooth api handling</p>
            </div>
            <div class="team-member">
                <img src="https://raw.githubusercontent.com/Asif-Tanvir-2006/MentL/refs/heads/main/static/arit.png"
                    alt="aritro">
                <h3>Aritro Shome</h3>
                <p class="role">Lead Backend Dev</p>
                <p>Tech guru ensuring cutting-edge solutions</p>
            </div>
            <div class="team-member">
                <img src="https://raw.githubusercontent.com/Asif-Tanvir-2006/MentL/refs/heads/main/static/pray.png"
                    alt="prayas">
                <h3>Prayas Sinha</h3>
                <p class="role">Functionality Dev</p>
                <p>Strategist expanding ingenious ideas</p>
            </div>
            <div class="team-member">
                <img src="https://raw.githubusercontent.com/Asif-Tanvir-2006/MentL/refs/heads/main/static/ved.png"
                    alt="vedanta">
                <h3>Vedanta Saha</h3>
                <p class="role">User Interface Dev</p>
                <p>Creative mind behind our stunning visuals</p>
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