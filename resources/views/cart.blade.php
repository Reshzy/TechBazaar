@extends('layouts.app')

@section('content')
<div class="bg-black min-h-screen relative">
    <!-- Abstract Background Shape -->
    <div class="absolute top-0 left-0 w-full h-screen bg-gradient-to-b from-indigo-900/20 to-transparent opacity-60 z-0"></div>

    <div class="container mx-auto px-4 py-12 relative z-10">
        <!-- Breadcrumb Navigation -->
        <nav class="flex items-center text-sm text-gray-400 mb-12" data-aos="fade-down">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
            <span class="mx-2">/</span>
            <span class="text-white">Cart</span>
        </nav>

        <div class="mb-12" data-aos="fade-up">
            <h1 class="text-5xl md:text-7xl font-bold text-white leading-tight tracking-tight">Your <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-purple-500">Cart</span></h1>
            <p class="text-gray-400 text-lg mt-4 max-w-2xl">Review your items and proceed to checkout.</p>
        </div>

        @if(session('success'))
        <div class="backdrop-blur-sm bg-green-900/30 border border-green-500/30 text-green-400 px-6 py-4 rounded-xl mb-8 flex items-center" data-aos="fade-up" data-aos-delay="100">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="backdrop-blur-sm bg-red-900/30 border border-red-500/30 text-red-400 px-6 py-4 rounded-xl mb-8 flex items-center" data-aos="fade-up" data-aos-delay="100">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            {{ session('error') }}
        </div>
        @endif

        @if(count($cartItems) > 0)
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Cart Items -->
            <div class="lg:col-span-2" data-aos="fade-right" data-aos-duration="1000">
                <div class="backdrop-blur-sm bg-gray-900/50 rounded-2xl border border-gray-800 overflow-hidden">
                    <div class="p-6 border-b border-gray-800">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-bold text-white">Items ({{ count($cartItems) }})</h2>
                            <a href="{{ route('cart.clear') }}" class="text-red-400 hover:text-red-300 text-sm font-medium transition-colors flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Clear Cart
                            </a>
                        </div>
                    </div>

                    <ul class="divide-y divide-gray-800">
                        @foreach($cartItems as $id => $details)
                        @if(isset($products[$id]))
                        <li class="p-6 transition-all hover:bg-gray-800/30" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                            <div class="flex flex-col sm:flex-row gap-4">
                                <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-xl bg-gray-800 overflow-hidden border border-gray-700 flex-shrink-0 group relative">
                                    @if($products[$id]->name == 'Wireless Headphones')
                                    <img src="https://images.unsplash.com/photo-1578319439584-104c94d37305?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="{{ $products[$id]->name }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                                    @elseif($products[$id]->name == 'Smart Watch')
                                    <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="{{ $products[$id]->name }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                                    @elseif($products[$id]->name == 'Bluetooth Speaker')
                                    <img src="https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="{{ $products[$id]->name }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                                    @elseif($products[$id]->name == 'Smart Speaker')
                                    <img src="https://images.unsplash.com/photo-1512446816042-444d641267d4?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="{{ $products[$id]->name }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                                    @elseif($products[$id]->name == 'Smart Light Bulb')
                                    <img src="https://images.unsplash.com/photo-1711006155490-ec01a0ecf0de?q=80&w=400&auto=format&fit=crop&ixlib=rb-4.0.3" alt="{{ $products[$id]->name }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                                    @else
                                    <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="{{ $products[$id]->name }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-indigo-900/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                </div>

                                <div class="flex-1 flex flex-col sm:flex-row justify-between gap-6">
                                    <div>
                                        <h3 class="text-lg font-bold text-white hover:text-indigo-400 transition-colors">
                                            <a href="{{ route('product.show', $products[$id]->slug) }}">{{ $products[$id]->name }}</a>
                                        </h3>
                                        <p class="text-gray-400 text-sm mt-1">
                                            {{ $products[$id]->category->name }}
                                        </p>
                                        <div class="mt-2 text-lg font-bold text-white">
                                            ${{ number_format($products[$id]->price, 2) }}
                                        </div>
                                    </div>

                                    <div class="flex flex-col sm:flex-row items-end sm:items-center gap-4">
                                        <form action="{{ route('cart.update') }}" method="POST" class="flex items-center bg-gray-800 rounded-lg overflow-hidden">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $id }}">
                                            <button type="button" onclick="decrementQuantity(this)" class="px-3 py-2 text-gray-400 hover:text-white focus:outline-none transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                                </svg>
                                            </button>
                                            <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="w-12 bg-transparent border-0 text-center text-white focus:outline-none">
                                            <button type="button" onclick="incrementQuantity(this)" class="px-3 py-2 text-gray-400 hover:text-white focus:outline-none transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                                </svg>
                                            </button>
                                            <button type="submit" class="bg-gray-700 h-full px-3 text-indigo-400 hover:text-indigo-300 transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                                </svg>
                                            </button>
                                        </form>

                                        <a href="{{ route('cart.remove', $id) }}" class="text-red-400 hover:text-red-300 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>

                <div class="mt-8" data-aos="fade-up">
                    <a href="{{ route('product.index') }}" class="inline-flex items-center text-indigo-400 hover:text-indigo-300 transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Continue Shopping
                    </a>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                <div class="backdrop-blur-sm bg-gray-900/50 rounded-2xl border border-gray-800 p-6">
                    <h2 class="text-xl font-bold text-white mb-6">Order Summary</h2>

                    <div class="space-y-4">
                        <div class="flex justify-between">
                            <span class="text-gray-400">Subtotal</span>
                            <span class="text-white font-medium">${{ number_format($total, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Tax (10%)</span>
                            <span class="text-white font-medium">${{ number_format($total * 0.1, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Shipping</span>
                            <span class="text-white font-medium">Free</span>
                        </div>

                        <div class="my-6 border-t border-b border-gray-800 py-4">
                            <div class="flex justify-between items-center">
                                <span class="text-white font-bold">Total</span>
                                <span class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-purple-500">${{ number_format($total * 1.1, 2) }}</span>
                            </div>
                        </div>

                        <!-- Promo Code -->
                        <div class="pt-2">
                            <label class="block text-sm text-gray-400 mb-2">Promo Code</label>
                            <div class="flex">
                                <input type="text" placeholder="Enter code" class="flex-1 bg-gray-800 border border-gray-700 rounded-l-lg px-4 py-3 text-white focus:outline-none focus:border-indigo-500 transition-colors">
                                <button class="bg-gray-800 border border-gray-700 border-l-0 rounded-r-lg px-4 text-indigo-400 hover:text-indigo-300 transition-colors">
                                    Apply
                                </button>
                            </div>
                        </div>

                        <button class="w-full mt-6 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-medium py-4 px-6 rounded-xl flex items-center justify-center transition-all duration-300 transform hover:scale-[1.02]">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                            Proceed to Checkout
                        </button>

                        <div class="mt-6 flex items-center justify-center">
                            <span class="flex items-center text-gray-400 text-sm">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                Secure Payment
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Payment Methods -->
                <div class="mt-6 backdrop-blur-sm bg-gray-900/50 rounded-2xl border border-gray-800 p-6" data-aos="fade-up" data-aos-delay="300">
                    <h3 class="text-white font-medium mb-4">We Accept</h3>
                    <div class="flex flex-wrap gap-3">
                        <div class="w-12 h-8 bg-gray-800 rounded-md flex items-center justify-center">
                            <span class="text-blue-500 font-bold text-sm">Visa</span>
                        </div>
                        <div class="w-12 h-8 bg-gray-800 rounded-md flex items-center justify-center">
                            <span class="text-red-500 font-bold text-sm">MC</span>
                        </div>
                        <div class="w-12 h-8 bg-gray-800 rounded-md flex items-center justify-center">
                            <span class="text-gray-400 font-bold text-sm">Amex</span>
                        </div>
                        <div class="w-12 h-8 bg-gray-800 rounded-md flex items-center justify-center">
                            <span class="text-blue-400 font-bold text-sm">PayP</span>
                        </div>
                        <div class="w-12 h-8 bg-gray-800 rounded-md flex items-center justify-center">
                            <span class="text-yellow-500 font-bold text-sm">BTC</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="backdrop-blur-sm bg-gray-900/50 rounded-2xl border border-gray-800 p-12 text-center" data-aos="fade-up">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gray-800 mb-6">
                <svg class="w-10 h-10 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-white mb-3">Your cart is empty</h2>
            <p class="text-gray-400 mb-8 max-w-md mx-auto">Looks like you haven't added anything to your cart yet. Browse our products and find something you like.</p>

            <a href="{{ route('product.index') }}" class="inline-flex items-center justify-center bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-medium py-3 px-8 rounded-xl transition-all duration-300 transform hover:scale-[1.02]">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
                Shop Products
            </a>
        </div>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize AOS animation library if available
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                easing: 'ease-out',
                once: true
            });
        }
    });

    function incrementQuantity(button) {
        const input = button.parentNode.querySelector('input[type="number"]');
        input.value = parseInt(input.value) + 1;
    }

    function decrementQuantity(button) {
        const input = button.parentNode.querySelector('input[type="number"]');
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }
</script>

<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
@endsection