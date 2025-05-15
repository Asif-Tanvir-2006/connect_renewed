<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MikeHawk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        cyan: {
                            400: '#22d3ee',
                            500: '#06b6d4',
                            600: '#0891b2',
                        },
                        dark: {
                            900: '#0a0a0a',
                            800: '#1a1a1a',
                            700: '#2a2a2a',
                        }
                    },
                    animation: {
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'float-reverse': 'float 6s ease-in-out infinite reverse',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        
        .blob {
            position: absolute;
            width: 500px;
            height: 500px;
            background: linear-gradient(180deg, rgba(34, 211, 238, 0.15) 0%, rgba(6, 182, 212, 0.1) 100%);
            filter: blur(100px);
            border-radius: 50%;
            z-index: -1;
        }
        
        .blob-1 {
            top: -150px;
            left: -150px;
        }
        
        .blob-2 {
            bottom: -150px;
            right: -150px;
        }
        
        .card-glass {
            background: rgba(26, 26, 26, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(34, 211, 238, 0.1);
        }
        
        .btn-cyber {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .btn-cyber::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(34, 211, 238, 0.4), transparent);
            transition: all 0.7s ease;
        }
        
        .btn-cyber:hover::before {
            left: 100%;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #22d3ee;
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #0a0a0a;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease-out;
        }
        
        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid rgba(34, 211, 238, 0.2);
            border-top: 5px solid #22d3ee;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .grid-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(34, 211, 238, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(34, 211, 238, 0.05) 1px, transparent 1px);
            background-size: 30px 30px;
            z-index: -1;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(6, 182, 212, 0.1), 0 10px 10px -5px rgba(6, 182, 212, 0.04);
        }
        
        .glow-text {
            text-shadow: 0 0 10px rgba(34, 211, 238, 0.7);
        }
    </style>
</head>
<body class="bg-dark-900 text-gray-200 overflow-hidden relative min-h-screen">
    <!-- Loading Screen -->
    <div id="loadingScreen" class="loading-screen">
        <div class="loading-spinner mb-4"></div>
        <p class="text-cyan-400 font-mono text-lg mt-4">Initializing Lenda...</p>
    </div>
    
    <!-- Grid Background Pattern -->
    <div class="grid-pattern"></div>
    
    <!-- Blob Background Elements -->
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    
    <!-- Navbar -->
    <nav class="backdrop-blur-md   fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <div class="flex items-center">
                        <!-- <div class="w-8 h-8 rounded-full bg-cyan-500 flex items-center justify-center mr-2">
                            <i class="fas fa-atom text-dark-900 text-lg"></i>
                        </div> -->
                        <span class="text-cyan-400 font-bold text-xl font-mono">TUNG TUNG TUNG SAHUR</span>
                    </div>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="#" class="nav-link relative px-3 py-2 text-sm font-medium text-gray-300 hover:text-cyan-400 transition-colors duration-300">Home</a>
                        <a href="#" class="nav-link relative px-3 py-2 text-sm font-medium text-gray-300 hover:text-cyan-400 transition-colors duration-300">About</a>
                        
                    </div>
                </div>
                
                <!-- Auth Buttons -->
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6 space-x-4">
                        <a href="/login" class="px-4 py-2 rounded-md text-cyan-400 border border-cyan-400 hover:bg-cyan-400/10 transition-colors duration-300 font-medium">Login</a>
                        <a href="/signup" class="btn-cyber px-4 py-2 rounded-md bg-cyan-500 text-dark-900 font-medium hover:bg-cyan-400 transition-colors duration-300">Sign Up</a>
                    </div>
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button id="mobileMenuButton" class="text-gray-300 hover:text-cyan-400 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobileMenu" class="md:hidden hidden bg-dark-800 border-t border-dark-700">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-cyan-400 hover:bg-dark-700">Home</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-cyan-400 hover:bg-dark-700">Features</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-cyan-400 hover:bg-dark-700">Pricing</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-cyan-400 hover:bg-dark-700">About</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-cyan-400 hover:bg-dark-700">Contact</a>
                <div class="pt-2 space-y-2">
                    <button class="w-full px-3 py-2 rounded-md text-center text-cyan-400 border border-cyan-400 hover:bg-cyan-400/10">Login</button>
                    <button class="w-full px-3 py-2 rounded-md text-center bg-cyan-500 text-dark-900 font-medium hover:bg-cyan-400">Sign Up</button>
                </div>
            </div>
        </div>
    </nav>
    
    
    <!-- Main Content -->
    <main class="pt-24 pb-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div style="margin-top: 5em;"></div>
        <!-- Hero Section -->
        <section class="relative overflow-hidden">
            <div class="flex flex-col lg:flex-row items-center justify-between">
                <div class="lg:w-1/2 mb-12 lg:mb-0">
                    <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-6 leading-tight">
                        <span class="text-cyan-400 glow-text">Elevate</span> Your Digital Experience
                    </h1>
                    <p class="text-lg text-gray-400 mb-8 max-w-lg">
                        Alkane Panda brings you the most advanced platform with cutting-edge technology. Experience the future today with our seamless integration and powerful features.
                    </p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="/signup" class="btn-cyber px-6 py-3 rounded-md bg-cyan-500 text-dark-900 font-medium hover:bg-cyan-400 transition-colors duration-300 text-lg">
                            Get Started <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        <a href="#" class="px-6 py-3 rounded-md text-cyan-400 border border-cyan-400 hover:bg-cyan-400/10 transition-colors duration-300 font-medium text-lg">
                            Learn More
                        </a>
                    </div>
                    <div class="mt-8 flex items-center space-x-6">
                        <div class="flex -space-x-2">
                            <img class="w-10 h-10 rounded-full border-2 border-dark-800" src="https://randomuser.me/api/portraits/women/12.jpg" alt="User 1">
                            <img class="w-10 h-10 rounded-full border-2 border-dark-800" src="https://randomuser.me/api/portraits/men/32.jpg" alt="User 2">
                            <img class="w-10 h-10 rounded-full border-2 border-dark-800" src="https://randomuser.me/api/portraits/women/45.jpg" alt="User 3">
                        </div>
                        <div>
                            <p class="text-gray-400 text-sm">Join <span class="text-cyan-400 font-medium">10,000+</span> happy users</p>
                            <div class="flex items-center">
                                <i class="fas fa-star text-yellow-400 mr-1"></i>
                                <span class="text-gray-300 font-medium">4.9</span>
                                <span class="text-gray-500 text-sm ml-1">(1,200 reviews)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2 relative">
                    <div class="card-glass p-2 rounded-xl max-w-md mx-auto lg:mx-0 lg:ml-auto">
                        <div class="bg-dark-800 rounded-lg overflow-hidden border border-dark-700">
                            <div class="bg-dark-700 px-4 py-2 flex items-center">
                                <div class="flex space-x-2">
                                    <div class="w-3 h-3 rounded-full bg-red-500"></div>
                                    <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                                    <div class="w-3 h-3 rounded-full bg-green-500"></div>
                                </div>
                                <div class="text-xs text-gray-400 ml-4">dashboard.js</div>
                            </div>
                            <div class="p-4 font-mono text-sm">
                                <div class="text-cyan-400 mb-2">// Welcome to Lenda Dashboard</div>
                                <div class="text-purple-400">const</div> <span class="text-cyan-400">features</span> = [<br>
                                &nbsp;&nbsp;{ <span class="text-green-400">"name"</span>: <span class="text-yellow-400">"Real-time Analytics"</span> },<br>
                                &nbsp;&nbsp;{ <span class="text-green-400">"name"</span>: <span class="text-yellow-400">"Secure Encryption"</span> },<br>
                                &nbsp;&nbsp;{ <span class="text-green-400">"name"</span>: <span class="text-yellow-400">"AI Integration"</span> },<br>
                                &nbsp;&nbsp;{ <span class="text-green-400">"name"</span>: <span class="text-yellow-400">"Custom Workflows"</span> }<br>
                                ];
                            </div>
                        </div>
                    </div>
                    <div class="absolute -bottom-10 -left-10 w-32 h-32 rounded-full bg-cyan-500/20 blur-xl"></div>
                    <div class="absolute -top-10 -right-10 w-40 h-40 rounded-full bg-cyan-500/15 blur-xl"></div>
                </div>
            </div>
        </section>
        
 
    
    
    <script>
        // Loading screen animation
        window.addEventListener('load', function() {
            setTimeout(function() {
                const loadingScreen = document.getElementById('loadingScreen');
                loadingScreen.style.opacity = '0';
                setTimeout(function() {
                    loadingScreen.style.display = 'none';
                }, 500);
            }, 1500);
        });
        
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
        
        // Add floating animation to elements
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.animate-float');
            elements.forEach((el, index) => {
                // Apply different animation delays
                el.style.animationDelay = `${index * 0.2}s`;
            });
        });
        
        // Button hover effect enhancement
        const cyberButtons = document.querySelectorAll('.btn-cyber');
        cyberButtons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.boxShadow = '0 0 15px rgba(34, 211, 238, 0.5)';
            });
            button.addEventListener('mouseleave', function() {
                this.style.boxShadow = 'none';
            });
        });
    </script>
</body>
</html> 