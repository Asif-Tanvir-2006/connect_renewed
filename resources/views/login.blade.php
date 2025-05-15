<!DOCTYPE html>
<html lang="en">

<head>
    <!-- The order in which link rel is defined for both is very important. -->
    <!-- <link rel="stylesheet"
        href="https://cdn.statically.io/gh/Asif-Tanvir-2006/connect_renewed/main/public/css/login.css"> -->
    <!-- <link href="{{ asset('css/login.css') }}" rel="stylesheet"> -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
     <style>

        

        body {
            background-color: #0a0a0a;
            
            
                 }

        

        
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

        /* Center the .view container */
        .view {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Responsive login box */
        .box {
            background: rgba(26, 26, 26, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 1rem;
            box-shadow: 0 8px 32px 0 rgba(34, 211, 238, 0.15);
            padding: 2rem 2.5rem;
            max-width: 350px;
            width: 100%;
            margin: 0 auto;
            border: 1px solid rgba(34, 211, 238, 0.12);
            backdrop-filter: blur(8px);
            transition: box-shadow 0.3s;
           
    }


        @media (max-width: 500px) {
            .box {
                padding: 1.5rem 1rem;
                max-width: 80vw;
            }
        }

        /* Login form styling */
        .wrapper {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }

        .caption {
            color: #22d3ee;
            font-weight: 600;
            margin-bottom: 0.3rem;
            font-size: 1rem;
        }

        .upper, .lower {
            margin-bottom: 0.8rem;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 0.7rem 1rem;
            border-radius: 0.5rem;
            border: 1px solid #22d3ee33;
            background: #18181b;
            color: #e0f2fe;
            font-size: 1rem;
            outline: none;
            transition: border 0.2s;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #22d3ee;
        }

        button[type="submit"], .wrapper button {
            width: 100%;
            padding: 0.7rem 0;
            background: linear-gradient(90deg, #22d3ee 60%, #06b6d4 100%);
            color: #18181b;
            font-weight: 700;
            border: none;
            border-radius: 0.5rem;
            margin-top: 0.5rem;
            cursor: pointer;
            transition: background 0.2s;
        }

        button[type="submit"]:hover, .wrapper button:hover {
            background: linear-gradient(90deg, #06b6d4 60%, #22d3ee 100%);
        }

        .cap {
            text-align: center;
            color: #a1a1aa;
            font-size: 0.95rem;
            margin-top: 0.7rem;
        }

        .cap a {
            color: #22d3ee;
            text-decoration: underline;
            transition: color 0.2s;
        }

        .cap a:hover {
            color: #06b6d4;
        }

        
    </style>
</head>

<body>
        <!-- Grid Background Pattern -->
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
                <div class="hidden md:flex flex-1 justify-center">
                    <div class="flex items-baseline space-x-8 mr-24">
                        <a href="/welcome" class="nav-link relative px-3 py-2 text-sm font-medium text-gray-300 hover:text-cyan-400 transition-colors duration-300">Home</a>
                        <a href="#" class="nav-link relative px-3 py-2 text-sm font-medium text-gray-300 hover:text-cyan-400 transition-colors duration-300">About</a>
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
                
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-cyan-400 hover:bg-dark-700">About</a>
                <div class="pt-2 space-y-2">
                    <button class="w-full px-3 py-2 rounded-md text-center text-cyan-400 border border-cyan-400 hover:bg-cyan-400/10">Login</button>
                    <button class="w-full px-3 py-2 rounded-md text-center bg-cyan-500 text-dark-900 font-medium hover:bg-cyan-400">Sign Up</button>
                </div>
            </div>
        </div>
    </nav>


    
    <div class="view">
        <div class="padder">

        </div>
        <div class="box">
            <div class="wrapper">
                <form method="POST" action="/login">
                    @csrf
                    <div class="caption">G-Suite ID </div>
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




    <script>
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
        
    </script>

    
</body>

</html>