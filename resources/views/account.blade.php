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
            <span class="text-white">Account</span>
        </nav>
        
        <div class="mb-12" data-aos="fade-up">
            <h1 class="text-5xl md:text-7xl font-bold text-white leading-tight tracking-tight">Your <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-purple-500">Account</span></h1>
            <p class="text-gray-400 text-lg mt-4 max-w-2xl">Manage your profile, view orders, and adjust account settings.</p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-12">
            <!-- Profile Section -->
            <div class="lg:col-span-1" data-aos="fade-right" data-aos-duration="1000">
                <div class="backdrop-blur-sm bg-gray-900/50 rounded-2xl p-8 border border-gray-800 h-full">
                    <div class="flex flex-col items-center text-center mb-8">
                        <div class="w-32 h-32 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center mb-6 p-1">
                            <div class="w-full h-full rounded-full bg-gray-900 flex items-center justify-center text-4xl font-bold text-white overflow-hidden">
                                <span>JD</span>
                            </div>
                        </div>
                        
                        <h2 class="text-2xl font-bold text-white mb-2">John Doe</h2>
                        <p class="text-gray-400">john@example.com</p>
                        <div class="mt-4 px-4 py-2 rounded-full bg-indigo-900/30 text-indigo-400 text-xs font-medium">
                            Member Since January 2023
                        </div>
                    </div>
                    
                    <div class="space-y-4 mt-8">
                        <button class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-medium transition-all duration-300 transform hover:scale-[1.02] flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit Profile
                        </button>
                        
                        <button class="w-full py-3 px-4 rounded-xl bg-gray-800 hover:bg-gray-700 text-gray-200 font-medium transition-all duration-300 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Logout
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Account Details and Orders -->
            <div class="lg:col-span-2" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="100">
                <!-- Account Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                    <div class="backdrop-blur-sm bg-gray-900/50 rounded-xl p-6 border border-gray-800 transition-all duration-300 hover:border-indigo-500/50 hover:translate-y-[-5px]">
                        <div class="text-indigo-400 mb-2">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </div>
                        <div class="text-2xl font-bold text-white">12</div>
                        <div class="text-sm text-gray-400">Orders</div>
                    </div>
                    
                    <div class="backdrop-blur-sm bg-gray-900/50 rounded-xl p-6 border border-gray-800 transition-all duration-300 hover:border-indigo-500/50 hover:translate-y-[-5px]">
                        <div class="text-indigo-400 mb-2">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <div class="text-2xl font-bold text-white">5</div>
                        <div class="text-sm text-gray-400">Wishlist</div>
                    </div>
                    
                    <div class="backdrop-blur-sm bg-gray-900/50 rounded-xl p-6 border border-gray-800 transition-all duration-300 hover:border-indigo-500/50 hover:translate-y-[-5px]">
                        <div class="text-indigo-400 mb-2">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                        </div>
                        <div class="text-2xl font-bold text-white">3</div>
                        <div class="text-sm text-gray-400">Reviews</div>
                    </div>
                    
                    <div class="backdrop-blur-sm bg-gray-900/50 rounded-xl p-6 border border-gray-800 transition-all duration-300 hover:border-indigo-500/50 hover:translate-y-[-5px]">
                        <div class="text-indigo-400 mb-2">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="text-2xl font-bold text-white">$820</div>
                        <div class="text-sm text-gray-400">Total Spent</div>
                    </div>
                </div>
                
                <!-- Tabs -->
                <div x-data="{ activeTab: 'orders' }" class="backdrop-blur-sm bg-gray-900/50 rounded-2xl border border-gray-800 overflow-hidden">
                    <!-- Tab Navigation -->
                    <div class="flex border-b border-gray-800 overflow-x-auto scrollbar-hide">
                        <button @click="activeTab = 'orders'" :class="{'bg-indigo-600 text-white': activeTab === 'orders', 'text-gray-400 hover:text-white': activeTab !== 'orders'}" class="px-6 py-4 font-medium transition-colors focus:outline-none flex-shrink-0">
                            Recent Orders
                        </button>
                        <button @click="activeTab = 'wishlist'" :class="{'bg-indigo-600 text-white': activeTab === 'wishlist', 'text-gray-400 hover:text-white': activeTab !== 'wishlist'}" class="px-6 py-4 font-medium transition-colors focus:outline-none flex-shrink-0">
                            Wishlist
                        </button>
                        <button @click="activeTab = 'addresses'" :class="{'bg-indigo-600 text-white': activeTab === 'addresses', 'text-gray-400 hover:text-white': activeTab !== 'addresses'}" class="px-6 py-4 font-medium transition-colors focus:outline-none flex-shrink-0">
                            Addresses
                        </button>
                        <button @click="activeTab = 'settings'" :class="{'bg-indigo-600 text-white': activeTab === 'settings', 'text-gray-400 hover:text-white': activeTab !== 'settings'}" class="px-6 py-4 font-medium transition-colors focus:outline-none flex-shrink-0">
                            Settings
                        </button>
                    </div>
                    
                    <!-- Tab Content -->
                    <div class="p-6">
                        <!-- Orders Tab -->
                        <div x-show="activeTab === 'orders'" class="space-y-6">
                            <!-- Order Item -->
                            <div class="border border-gray-800 rounded-xl p-4 hover:border-indigo-500/30 transition-colors">
                                <div class="flex flex-wrap justify-between items-start gap-4">
                                    <div>
                                        <div class="flex items-center mb-2">
                                            <span class="px-3 py-1 bg-green-900/30 text-green-400 rounded-full text-xs font-medium mr-3">Delivered</span>
                                            <span class="text-gray-400 text-sm">April 15, 2023</span>
                                        </div>
                                        <p class="text-white font-medium mb-1">Order #ORD-2023041501</p>
                                        <p class="text-gray-400 text-sm">2 items - $149.98</p>
                                    </div>
                                    <button class="text-indigo-400 hover:text-indigo-300 font-medium transition-colors text-sm">
                                        View Details
                                    </button>
                                </div>
                                <div class="flex items-center mt-4 pt-4 border-t border-gray-800">
                                    <div class="flex -space-x-2">
                                        <div class="w-8 h-8 rounded-full bg-gray-700 border-2 border-gray-900 overflow-hidden">
                                            <img src="https://images.unsplash.com/photo-1578319439584-104c94d37305?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="Product" class="object-cover w-full h-full">
                                        </div>
                                        <div class="w-8 h-8 rounded-full bg-gray-700 border-2 border-gray-900 overflow-hidden">
                                            <img src="https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="Product" class="object-cover w-full h-full">
                                        </div>
                                    </div>
                                    <span class="ml-4 text-sm text-gray-400">Wireless Headphones, Bluetooth Speaker</span>
                                </div>
                            </div>
                            
                            <!-- Order Item -->
                            <div class="border border-gray-800 rounded-xl p-4 hover:border-indigo-500/30 transition-colors">
                                <div class="flex flex-wrap justify-between items-start gap-4">
                                    <div>
                                        <div class="flex items-center mb-2">
                                            <span class="px-3 py-1 bg-indigo-900/30 text-indigo-400 rounded-full text-xs font-medium mr-3">Shipped</span>
                                            <span class="text-gray-400 text-sm">March 28, 2023</span>
                                        </div>
                                        <p class="text-white font-medium mb-1">Order #ORD-2023032801</p>
                                        <p class="text-gray-400 text-sm">1 item - $299.99</p>
                                    </div>
                                    <button class="text-indigo-400 hover:text-indigo-300 font-medium transition-colors text-sm">
                                        View Details
                                    </button>
                                </div>
                                <div class="flex items-center mt-4 pt-4 border-t border-gray-800">
                                    <div class="flex -space-x-2">
                                        <div class="w-8 h-8 rounded-full bg-gray-700 border-2 border-gray-900 overflow-hidden">
                                            <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="Product" class="object-cover w-full h-full">
                                        </div>
                                    </div>
                                    <span class="ml-4 text-sm text-gray-400">Smart Watch</span>
                                </div>
                            </div>
                            
                            <div class="mt-6 text-center">
                                <button class="text-indigo-400 hover:text-indigo-300 font-medium transition-colors">
                                    View All Orders
                                </button>
                            </div>
                        </div>
                        
                        <!-- Wishlist Tab -->
                        <div x-show="activeTab === 'wishlist'" class="space-y-4" style="display: none;">
                            <p class="text-gray-400">Your saved items will appear here.</p>
                        </div>
                        
                        <!-- Addresses Tab -->
                        <div x-show="activeTab === 'addresses'" class="space-y-4" style="display: none;">
                            <p class="text-gray-400">Your shipping and billing addresses will appear here.</p>
                        </div>
                        
                        <!-- Settings Tab -->
                        <div x-show="activeTab === 'settings'" class="space-y-4" style="display: none;">
                            <p class="text-gray-400">Account settings and preferences.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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