<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechBazaar</title>
    @vite('resources/css/app.css')
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- AOS Animation Library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <!-- Custom Styles -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        /* Custom Cursor */
        .cursor-dot {
            width: 8px;
            height: 8px;
            background-color: #6366f1;
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9999;
            transform: translate(-50%, -50%);
            transition: transform 0.1s ease;
        }

        .cursor-outline {
            width: 40px;
            height: 40px;
            border: 2px solid rgba(99, 102, 241, 0.5);
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9998;
            transform: translate(-50%, -50%);
            transition: transform 0.15s ease, width 0.2s ease, height 0.2s ease;
        }

        a:hover~.cursor-outline,
        button:hover~.cursor-outline {
            width: 60px;
            height: 60px;
            border-color: rgba(99, 102, 241, 0.8);
        }

        /* Hide number input arrows/spinners */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }

        /* Page Transition Animation */
        .page-transition-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: linear-gradient(to right, #4338ca, #6366f1);
            z-index: 9999;
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.5s cubic-bezier(0.65, 0, 0.35, 1);
        }

        .page-transition-overlay.active {
            transform: scaleX(1);
            transform-origin: left;
        }

        .page-transition-overlay.exit {
            transform: scaleX(0);
            transform-origin: right;
        }

        /* Prevent initial flash on first load */
        .page-content {
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .page-content.visible {
            opacity: 1;
        }
    </style>
</head>

<body class="bg-black text-gray-900">
    <!-- Page Transition Overlay -->
    <div class="page-transition-overlay"></div>

    <!-- Custom Cursor (Awwwards style) -->
    <div class="cursor-dot hidden md:block"></div>
    <div class="cursor-outline hidden md:block"></div>

    <header class="fixed w-full z-50 bg-opacity-95 backdrop-blur-md bg-black border-b border-gray-800">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <img src="{{ asset('images/logo.svg') }}" alt="TechBazaar Logo" class="w-10 h-10 rounded-full">
                        <span class="ml-2 text-xl font-bold text-white">TechBazaar</span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-300 hover:text-white px-3 py-2 font-medium">Home</a>
                    <a href="{{ route('product.index') }}" class="text-gray-300 hover:text-white px-3 py-2 font-medium">Products</a>
                    <a href="{{ route('account') }}" class="text-gray-300 hover:text-white px-3 py-2 font-medium">Account</a>
                    <a href="{{ route('cart') }}" class="text-gray-300 hover:text-white px-3 py-2 font-medium">Cart</a>
                </nav>

                <!-- Mobile Navigation Button -->
                <div class="md:hidden" x-data="{ open: false }">
                    <button @click="open = !open" class="text-white hover:text-indigo-400 focus:outline-none">
                        <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>

                    <!-- Mobile Menu -->
                    <div x-show="open" @click.away="open = false" class="absolute top-16 right-0 left-0 bg-black bg-opacity-95 backdrop-blur-md border-b border-gray-800 py-2 z-50" style="display: none;">
                        <a href="{{ route('home') }}" class="block px-4 py-2 text-gray-300 hover:text-white hover:bg-gray-900">Home</a>
                        <a href="{{ route('product.index') }}" class="block px-4 py-2 text-gray-300 hover:text-white hover:bg-gray-900">Products</a>
                        <a href="{{ route('account') }}" class="block px-4 py-2 text-gray-300 hover:text-white hover:bg-gray-900">Account</a>
                        <a href="{{ route('cart') }}" class="block px-4 py-2 text-gray-300 hover:text-white hover:bg-gray-900">
                            Cart
                            @php
                            $cartItems = session('cart', []);
                            $cartCount = count($cartItems);
                            @endphp
                            @if($cartCount > 0)
                            <span class="ml-1 bg-indigo-600 text-white text-xs rounded-full px-2 py-0.5">{{ $cartCount }}</span>
                            @endif
                        </a>
                    </div>
                </div>

                <!-- Search and Cart Icons -->
                <div class="hidden md:flex items-center space-x-4">
                    <button class="text-gray-300 hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                    <a href="{{ route('cart') }}" class="text-gray-300 hover:text-white relative">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        @php
                        $cartItems = session('cart', []);
                        $cartCount = count($cartItems);
                        @endphp
                        @if($cartCount > 0)
                        <span class="absolute -top-1 -right-1 bg-indigo-600 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">{{ $cartCount }}</span>
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="pt-20 page-content">
        <div class="container mx-auto px-4">
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
                <button class="absolute top-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none'">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            @endif

            @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                {{ session('error') }}
                <button class="absolute top-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none'">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            @endif
        </div>

        @yield('content')
    </main>

    <footer class="bg-gray-950 border-t border-gray-900 mt-10 py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 md:gap-8">
                <div>
                    <div class="flex items-center mb-6">
                        <img src="{{ asset('images/logo.svg') }}" alt="TechBazaar Logo" class="w-10 h-10">
                        <span class="ml-2 text-xl font-bold text-white">TechBazaar</span>
                    </div>
                    <p class="text-gray-400 mb-6">Your one-stop shop for the latest tech gadgets at unbeatable prices.</p>
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 hover:bg-indigo-600 flex items-center justify-center text-gray-300 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 hover:bg-indigo-600 flex items-center justify-center text-gray-300 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"></path>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 hover:bg-indigo-600 flex items-center justify-center text-gray-300 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-white mb-6">Shop</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('product.index', ['category' => 'audio']) }}" class="text-gray-400 hover:text-indigo-400 transition-colors">Audio</a></li>
                        <li><a href="{{ route('product.index', ['category' => 'wearables']) }}" class="text-gray-400 hover:text-indigo-400 transition-colors">Wearables</a></li>
                        <li><a href="{{ route('product.index', ['category' => 'accessories']) }}" class="text-gray-400 hover:text-indigo-400 transition-colors">Accessories</a></li>
                        <li><a href="{{ route('product.index', ['category' => 'smart-home']) }}" class="text-gray-400 hover:text-indigo-400 transition-colors">Smart Home</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-white mb-6">Support</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-indigo-400 transition-colors">Contact Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-indigo-400 transition-colors">Shipping Policy</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-indigo-400 transition-colors">Returns & Exchanges</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-indigo-400 transition-colors">FAQs</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-white mb-6">Newsletter</h3>
                    <p class="text-gray-400 mb-4">Subscribe to receive updates, access to exclusive deals, and more.</p>
                    <form class="flex">
                        <input type="email" placeholder="Enter your email" class="w-full px-4 py-2 bg-gray-900 border border-gray-800 focus:border-indigo-500 focus:outline-none rounded-l text-white">
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-r hover:bg-indigo-700 transition-colors">Subscribe</button>
                    </form>
                </div>
            </div>

            <div class="mt-10 pt-8 border-t border-gray-900 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-500 text-sm">&copy; {{ date('Y') }} TechBazaar. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-500 hover:text-indigo-400 text-sm">Privacy Policy</a>
                    <a href="#" class="text-gray-500 hover:text-indigo-400 text-sm">Terms of Service</a>
                    <a href="#" class="text-gray-500 hover:text-indigo-400 text-sm">Cookies Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Page Transition Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pageTransitionOverlay = document.querySelector('.page-transition-overlay');
            const pageContent = document.querySelector('.page-content');
            
            // Show content on initial load after a small delay
            setTimeout(() => {
                pageContent.classList.add('visible');
            }, 100);
            
            // Handle all navigation links (excluding external links, anchors, etc.)
            document.querySelectorAll('a').forEach(link => {
                // Only add transition to same-site navigation
                if (link.hostname === window.location.hostname && 
                    !link.href.includes('#') && 
                    link.target !== '_blank') {
                    
                    link.addEventListener('click', function(e) {
                        const destination = this.href;
                        
                        // Don't proceed with transition if clicking the current page
                        if (destination === window.location.href) {
                            return;
                        }
                        
                        e.preventDefault();
                        
                        // Animate transition overlay
                        pageTransitionOverlay.classList.add('active');
                        
                        // Fade out content
                        pageContent.style.opacity = 0;
                        
                        // Wait for animation to complete, then navigate
                        setTimeout(() => {
                            window.location.href = destination;
                        }, 500); // Match this with the CSS transition duration
                    });
                }
            });
            
            // When page loads, animate the exit of the transition overlay
            if (pageTransitionOverlay) {
                setTimeout(() => {
                    pageTransitionOverlay.classList.add('exit');
                }, 10);
            }
        });

        // Custom Cursor
        document.addEventListener('DOMContentLoaded', function() {
            const cursorDot = document.querySelector('.cursor-dot');
            const cursorOutline = document.querySelector('.cursor-outline');

            if (cursorDot && cursorOutline && window.innerWidth > 768) {
                window.addEventListener('mousemove', function(e) {
                    cursorDot.style.left = e.clientX + 'px';
                    cursorDot.style.top = e.clientY + 'px';

                    cursorOutline.style.left = e.clientX + 'px';
                    cursorOutline.style.top = e.clientY + 'px';
                });
            }

            // Initialize AOS animation library
            AOS.init({
                duration: 800,
                easing: 'ease-out',
                once: true,
                offset: 50,
            });
        });
    </script>
</body>

</html>