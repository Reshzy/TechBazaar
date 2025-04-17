@extends('layouts.app')

@section('content')
<div class="bg-black min-h-screen relative">
    <!-- Abstract Background Shape -->
    <div class="absolute top-0 left-0 w-full h-screen bg-gradient-to-b from-indigo-900/20 to-transparent opacity-60 z-0"></div>
    
    <div class="container mx-auto px-4 py-12 relative z-10">
        <!-- Breadcrumb Navigation -->
        <nav class="flex items-center text-sm text-gray-400 mb-6" data-aos="fade-down">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
            <span class="mx-2">/</span>
            <a href="{{ route('product.index') }}" class="hover:text-white transition-colors">Products</a>
            <span class="mx-2">/</span>
            <a href="{{ route('product.index', ['category' => $product->category->slug]) }}" class="hover:text-white transition-colors">{{ $product->category->name }}</a>
            <span class="mx-2">/</span>
            <span class="text-white">{{ $product->name }}</span>
        </nav>
        
        <div class="flex flex-col lg:flex-row gap-12 mt-8">
            <!-- Product Image Gallery -->
            <div class="lg:w-1/2" data-aos="fade-right" data-aos-duration="1000">
                <div class="relative overflow-hidden rounded-xl border border-gray-800 mb-4 group">
                    <div class="absolute inset-0 bg-gradient-to-tr from-indigo-500/20 to-purple-500/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-0"></div>
                    @if($product->name == 'Wireless Headphones')
                        <img src="https://images.unsplash.com/photo-1578319439584-104c94d37305?ixlib=rb-4.0.3&auto=format&fit=crop&w=1770&q=80" alt="{{ $product->name }}" class="w-full h-auto object-cover aspect-square transform transition-transform duration-700 group-hover:scale-105">
                    @elseif($product->name == 'Smart Watch')
                        <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1764&q=80" alt="{{ $product->name }}" class="w-full h-auto object-cover aspect-square transform transition-transform duration-700 group-hover:scale-105">
                    @elseif($product->name == 'Bluetooth Speaker')
                        <img src="https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1770&q=80" alt="{{ $product->name }}" class="w-full h-auto object-cover aspect-square transform transition-transform duration-700 group-hover:scale-105">
                    @elseif($product->name == 'Smart Speaker')
                        <img src="https://images.unsplash.com/photo-1512446816042-444d641267d4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1770&q=80" alt="{{ $product->name }}" class="w-full h-auto object-cover aspect-square transform transition-transform duration-700 group-hover:scale-105">
                    @elseif($product->name == 'Smart Light Bulb')
                        <img src="https://images.unsplash.com/photo-1711006155490-ec01a0ecf0de?q=80&w=2075&auto=format&fit=crop&ixlib=rb-4.0.3" alt="{{ $product->name }}" class="w-full h-auto object-cover aspect-square transform transition-transform duration-700 group-hover:scale-105">
                    @else
                        <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1764&q=80" alt="{{ $product->name }}" class="w-full h-auto object-cover aspect-square transform transition-transform duration-700 group-hover:scale-105">
                    @endif
                </div>
                
                <!-- Thumbnail Gallery -->
                <div class="grid grid-cols-4 gap-4">
                    @for($i = 1; $i <= 4; $i++)
                    <div class="relative overflow-hidden rounded-lg border border-gray-800 aspect-square cursor-pointer hover:border-indigo-500 transition-colors">
                        <img src="https://images.unsplash.com/photo-{{ 1570000000000 + $i * 15000 }}?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Thumbnail {{ $i }}" class="w-full h-full object-cover">
                    </div>
                    @endfor
                </div>
            </div>
            
            <!-- Product Details -->
            <div class="lg:w-1/2" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                <div class="sticky top-24">
                    <div class="flex items-center space-x-3 mb-4">
                        <span class="px-3 py-1 bg-indigo-900/30 text-indigo-400 rounded-full text-xs font-medium">{{ $product->category->name }}</span>
                        <div class="h-4 w-[1px] bg-gray-700"></div>
                        <div class="flex items-center text-amber-400">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $product->rating)
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>
                                @else
                                    <svg class="w-4 h-4 fill-current text-gray-700" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>
                                @endif
                            @endfor
                            <span class="ml-2 text-xs text-gray-400">({{ $product->reviews_count }} reviews)</span>
                        </div>
                    </div>
                    
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">{{ $product->name }}</h1>
                    
                    <div class="flex items-end mb-8">
                        <span class="text-3xl md:text-4xl font-bold text-white">${{ number_format($product->price, 2) }}</span>
                        @if($product->old_price)
                            <span class="ml-4 text-xl text-gray-500 line-through">${{ number_format($product->old_price, 2) }}</span>
                            <span class="ml-3 bg-gradient-to-r from-pink-500 to-rose-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                {{ $product->discountPercentage() }}% OFF
                            </span>
                        @endif
                    </div>
                    
                    <p class="text-gray-300 mb-8 leading-relaxed">
                        {{ $product->description }}
                    </p>
                    
                    <!-- Features -->
                    <div class="mb-8">
                        <h2 class="text-xl font-semibold text-white mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Key Features
                        </h2>
                        <ul class="space-y-3 text-gray-300">
                            @foreach(explode("\n", $product->features) as $feature)
                                <li class="flex items-start">
                                    <span class="inline-flex items-center justify-center rounded-full h-6 w-6 bg-indigo-900/40 text-indigo-400 mr-3 mt-0.5 flex-shrink-0">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </span>
                                    <span>{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <!-- Color Selection -->
                    @if($product->colors)
                    <div class="mb-8" data-aos="fade-up" data-aos-delay="300">
                        <h2 class="text-xl font-semibold text-white mb-4">Choose Color</h2>
                        <div class="flex flex-wrap gap-3">
                            @foreach(json_decode($product->colors) as $color)
                                <div class="color-option relative cursor-pointer group" data-color="{{ $color }}">
                                    <div class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full opacity-0 group-hover:opacity-70 transition-opacity blur"></div>
                                    <div class="color-circle relative w-12 h-12 rounded-full border-2 border-gray-700 group-hover:border-transparent transition-colors"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    
                    <!-- Add to Cart Section -->
                    <div class="mt-10 space-y-8" data-aos="fade-up" data-aos-delay="400">
                        <div class="flex items-end flex-wrap gap-4">
                            <!-- Quantity Selector -->
                            <div class="relative">
                                <label class="block text-sm text-gray-400 mb-2">Quantity</label>
                                <div class="flex items-center bg-gray-900/80 border border-gray-700 rounded-lg overflow-hidden">
                                    <button type="button" onclick="decrementQuantity()" class="px-4 py-3 text-gray-400 hover:text-white focus:outline-none transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                        </svg>
                                    </button>
                                    <input type="number" id="quantity" name="quantity" value="1" min="1" class="w-12 bg-transparent border-0 text-center text-white focus:outline-none">
                                    <button type="button" onclick="incrementQuantity()" class="px-4 py-3 text-gray-400 hover:text-white focus:outline-none transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Add to Cart Button -->
                            <form action="{{ route('cart.add') }}" method="POST" class="flex-1">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" id="cart_quantity" value="1">
                                <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-medium py-4 px-6 rounded-lg flex items-center justify-center transition-all duration-300 transform hover:scale-[1.02]">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                        
                        <!-- Shop Actions -->
                        <div class="flex flex-wrap gap-4">
                            <button class="flex items-center justify-center py-3 px-4 rounded-lg bg-gray-900 hover:bg-gray-800 text-gray-300 hover:text-white border border-gray-700 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                                Add to Wishlist
                            </button>
                            <button class="flex items-center justify-center py-3 px-4 rounded-lg bg-gray-900 hover:bg-gray-800 text-gray-300 hover:text-white border border-gray-700 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                                </svg>
                                Share
                            </button>
                        </div>
                        
                        <!-- Product Meta Info -->
                        <div class="border-t border-gray-800 pt-6 flex flex-col gap-3">
                            <div class="flex items-center text-sm">
                                <span class="text-gray-500 w-24">SKU:</span>
                                <span class="text-gray-300">{{ strtoupper(substr(md5($product->id), 0, 8)) }}</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <span class="text-gray-500 w-24">Category:</span>
                                <a href="{{ route('product.index', ['category' => $product->category->slug]) }}" class="text-indigo-400 hover:text-indigo-300 transition-colors">{{ $product->category->name }}</a>
                            </div>
                            <div class="flex items-center text-sm">
                                <span class="text-gray-500 w-24">Availability:</span>
                                @if($product->inStock())
                                    <span class="text-green-400 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        In Stock
                                    </span>
                                @else
                                    <span class="text-red-400 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                        Out of Stock
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Product Tabs Section -->
        <div class="mt-24 border-t border-gray-800 pt-16" data-aos="fade-up">
            <div class="mb-8">
                <div class="flex flex-wrap gap-2" x-data="{ activeTab: 'description' }">
                    <button @click="activeTab = 'description'" :class="{'bg-gradient-to-r from-indigo-600 to-purple-600 text-white': activeTab === 'description', 'bg-gray-900 text-gray-400 hover:text-white': activeTab !== 'description'}" class="px-6 py-3 rounded-full font-medium transition-all duration-300">
                        Description
                    </button>
                    <button @click="activeTab = 'specifications'" :class="{'bg-gradient-to-r from-indigo-600 to-purple-600 text-white': activeTab === 'specifications', 'bg-gray-900 text-gray-400 hover:text-white': activeTab !== 'specifications'}" class="px-6 py-3 rounded-full font-medium transition-all duration-300">
                        Specifications
                    </button>
                    <button @click="activeTab = 'reviews'" :class="{'bg-gradient-to-r from-indigo-600 to-purple-600 text-white': activeTab === 'reviews', 'bg-gray-900 text-gray-400 hover:text-white': activeTab !== 'reviews'}" class="px-6 py-3 rounded-full font-medium transition-all duration-300">
                        Reviews ({{ $product->reviews_count }})
                    </button>
                </div>
            </div>
            
            <div class="bg-gray-900/50 backdrop-blur-sm rounded-2xl p-8 border border-gray-800">
                <!-- Description Tab -->
                <div x-show="activeTab === 'description'" class="space-y-6">
                    <h2 class="text-2xl font-bold text-white">Product Description</h2>
                    <div class="text-gray-300 leading-relaxed space-y-4">
                        <p>{{ $product->description }}</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                            <div class="relative overflow-hidden rounded-xl aspect-video">
                                <img src="https://images.unsplash.com/photo-1698778573682-346d219402b5?q=80&w=2787&auto=format&fit=crop&ixlib=rb-4.0.3" alt="Product in use" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-white mb-3">Superior Quality</h3>
                                <p class="text-gray-400">Experience unmatched performance with our premium-grade materials and cutting-edge technology. Built to last and designed for the modern lifestyle.</p>
                                
                                <div class="mt-6 space-y-3">
                                    <div class="flex items-center">
                                        <div class="w-2 h-2 bg-indigo-500 rounded-full mr-3"></div>
                                        <span class="text-gray-300">Premium build quality</span>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-2 h-2 bg-indigo-500 rounded-full mr-3"></div>
                                        <span class="text-gray-300">Advanced connectivity options</span>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-2 h-2 bg-indigo-500 rounded-full mr-3"></div>
                                        <span class="text-gray-300">Extended battery life</span>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-2 h-2 bg-indigo-500 rounded-full mr-3"></div>
                                        <span class="text-gray-300">Designed for comfort</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Specifications Tab -->
                <div x-show="activeTab === 'specifications'" class="space-y-6" style="display: none;">
                    <h2 class="text-2xl font-bold text-white">Technical Specifications</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-4">
                            <div class="border-b border-gray-800 pb-3">
                                <h3 class="text-lg font-medium text-white">Dimensions & Weight</h3>
                                <div class="mt-3 space-y-2">
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">Height</span>
                                        <span class="text-gray-300">165 mm</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">Width</span>
                                        <span class="text-gray-300">74 mm</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">Depth</span>
                                        <span class="text-gray-300">8.3 mm</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">Weight</span>
                                        <span class="text-gray-300">189 g</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="border-b border-gray-800 pb-3">
                                <h3 class="text-lg font-medium text-white">Power & Battery</h3>
                                <div class="mt-3 space-y-2">
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">Battery Type</span>
                                        <span class="text-gray-300">Lithium-ion</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">Capacity</span>
                                        <span class="text-gray-300">5000 mAh</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">Fast Charging</span>
                                        <span class="text-gray-300">Yes, 65W</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="border-b border-gray-800 pb-3">
                                <h3 class="text-lg font-medium text-white">Connectivity</h3>
                                <div class="mt-3 space-y-2">
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">Bluetooth</span>
                                        <span class="text-gray-300">5.2</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">Wi-Fi</span>
                                        <span class="text-gray-300">802.11 a/b/g/n/ac/ax</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">USB</span>
                                        <span class="text-gray-300">Type-C</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="border-b border-gray-800 pb-3">
                                <h3 class="text-lg font-medium text-white">In the Box</h3>
                                <div class="mt-3 space-y-2">
                                    <div class="flex">
                                        <span class="text-indigo-400 mr-2">•</span>
                                        <span class="text-gray-300">{{ $product->name }}</span>
                                    </div>
                                    <div class="flex">
                                        <span class="text-indigo-400 mr-2">•</span>
                                        <span class="text-gray-300">USB-C charging cable</span>
                                    </div>
                                    <div class="flex">
                                        <span class="text-indigo-400 mr-2">•</span>
                                        <span class="text-gray-300">Quick start guide</span>
                                    </div>
                                    <div class="flex">
                                        <span class="text-indigo-400 mr-2">•</span>
                                        <span class="text-gray-300">Warranty card</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Reviews Tab -->
                <div x-show="activeTab === 'reviews'" class="space-y-6" style="display: none;">
                    <h2 class="text-2xl font-bold text-white">Customer Reviews</h2>
                    
                    <!-- Review Summary -->
                    <div class="flex flex-col md:flex-row gap-8 py-6">
                        <div class="text-center">
                            <div class="text-5xl font-bold text-white mb-2">{{ number_format($product->rating, 1) }}</div>
                            <div class="flex justify-center text-amber-400 mb-2">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $product->rating)
                                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>
                                    @else
                                        <svg class="w-5 h-5 fill-current text-gray-700" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>
                                    @endif
                                @endfor
                            </div>
                            <div class="text-gray-400 text-sm">Based on {{ $product->reviews_count }} reviews</div>
                        </div>
                        
                        <div class="flex-1">
                            <div class="space-y-2">
                                @for($i = 5; $i >= 1; $i--)
                                <div class="flex items-center">
                                    <span class="text-sm text-gray-400 w-8">{{ $i }} ★</span>
                                    <div class="flex-1 h-2 mx-2 bg-gray-800 rounded-full overflow-hidden">
                                        <div class="h-full bg-amber-400 w-[{{ ['1/4', '2/4', '3/4', 'full'][random_int(0, 3)] }}]"></div>
                                    </div>
                                    <span class="text-sm text-gray-400 w-8">{{ rand(1, 20) }}</span>
                                </div>
                                @endfor
                            </div>
                        </div>
                        
                        <div class="md:border-l border-gray-800 md:pl-8 flex flex-col justify-center items-center">
                            <button class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-medium rounded-lg transition-all duration-300 transform hover:scale-[1.02]">
                                Write a Review
                            </button>
                        </div>
                    </div>
                    
                    <!-- Sample Reviews -->
                    <div class="space-y-6 pt-4">
                        @for($i = 1; $i <= 3; $i++)
                        <div class="border-b border-gray-800 pb-6 space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 rounded-full bg-gradient-to-r from-indigo-500 to-purple-500 flex items-center justify-center text-white font-bold">
                                        {{ chr(64 + $i) }}{{ chr(64 + $i + 1) }}
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-white font-medium">{{ ['John D.', 'Sarah M.', 'Michael T.'][$i-1] }}</h4>
                                        <p class="text-gray-500 text-sm">{{ date('M d, Y', strtotime('-'.$i.' months')) }}</p>
                                    </div>
                                </div>
                                <div class="flex text-amber-400">
                                    @for($j = 1; $j <= 5; $j++)
                                        @if($j <= 5 - ($i-1))
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>
                                        @else
                                            <svg class="w-4 h-4 fill-current text-gray-700" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            <h3 class="text-white font-medium">{{ ['Excellent quality and design', 'Good value for money', 'Does the job well'][$i-1] }}</h3>
                            <p class="text-gray-400">{{ ['This product exceeded my expectations. The build quality is excellent, and it works flawlessly with all my devices. Battery life is impressive too.', 'For the price, this offers great value. The features are comparable to much more expensive alternatives. Only giving 4 stars because the app could use some improvements.', 'It does what it says on the tin. Nothing fancy but reliable and easy to use. Would recommend for anyone looking for a basic solution.'][$i-1] }}</p>
                        </div>
                        @endfor
                        
                        <div class="text-center pt-4">
                            <button class="text-indigo-400 hover:text-indigo-300 font-medium transition-colors">
                                Load More Reviews
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
        <div class="mt-24" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-white mb-8 flex items-center">
                <span class="bg-gradient-to-r from-indigo-400 to-purple-400 h-6 w-[3px] rounded mr-4"></span>
                You May Also Like
            </h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($relatedProducts as $relatedProduct)
                <div class="group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="relative bg-gradient-to-b from-gray-900 to-black rounded-xl overflow-hidden shadow-lg border border-gray-800 h-full flex flex-col transform transition-all duration-500 hover:shadow-2xl hover:border-indigo-500/30 hover:translate-y-[-5px]">
                        <div class="absolute top-3 right-3 z-10">
                            @if($relatedProduct->old_price)
                                <span class="bg-gradient-to-r from-pink-500 to-rose-500 text-white text-xs font-bold px-3 py-1 rounded-full">
                                    {{ $relatedProduct->discountPercentage() }}% OFF
                                </span>
                            @endif
                        </div>
                        
                        <!-- Product Image with Hover Effect -->
                        <div class="relative overflow-hidden h-56">
                            @if($relatedProduct->name == 'Wireless Headphones')
                                <img src="https://images.unsplash.com/photo-1578319439584-104c94d37305?ixlib=rb-4.0.3&auto=format&fit=crop&w=1770&q=80" alt="{{ $relatedProduct->name }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                            @elseif($relatedProduct->name == 'Smart Watch')
                                <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1764&q=80" alt="{{ $relatedProduct->name }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                            @elseif($relatedProduct->name == 'Bluetooth Speaker')
                                <img src="https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1770&q=80" alt="{{ $relatedProduct->name }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                            @elseif($relatedProduct->name == 'Smart Speaker')
                                <img src="https://images.unsplash.com/photo-1512446816042-444d641267d4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1770&q=80" alt="{{ $relatedProduct->name }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                            @elseif($relatedProduct->name == 'Smart Light Bulb')
                                <img src="https://images.unsplash.com/photo-1711006155490-ec01a0ecf0de?q=80&w=2075&auto=format&fit=crop&ixlib=rb-4.0.3" alt="{{ $relatedProduct->name }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                            @else
                                <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1764&q=80" alt="{{ $relatedProduct->name }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-60 transition-opacity"></div>
                            
                            <div class="absolute bottom-0 left-0 right-0 overflow-hidden flex items-center transition-transform duration-300 transform translate-y-full group-hover:translate-y-0">
                                <div class="flex items-center w-full justify-center divide-x divide-gray-700 bg-black/70 backdrop-blur-sm py-3">
                                    <a href="{{ route('product.show', $relatedProduct->slug) }}" class="flex-1 flex justify-center items-center text-gray-300 hover:text-white transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    </a>
                                    <form action="{{ route('cart.add') }}" method="POST" class="flex-1">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $relatedProduct->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="w-full flex justify-center items-center text-gray-300 hover:text-white transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Product Info -->
                        <div class="p-5 flex flex-col flex-grow">
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-xs px-2 py-1 bg-indigo-900/50 text-indigo-300 rounded-full">{{ $relatedProduct->category->name }}</span>
                                <div class="flex text-amber-400">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $relatedProduct->rating)
                                            <svg class="w-3 h-3 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>
                                        @else
                                            <svg class="w-3 h-3 fill-current text-gray-700" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            
                            <h3 class="text-lg font-bold text-white mt-1 hover:text-indigo-400 transition-colors">
                                <a href="{{ route('product.show', $relatedProduct->slug) }}">{{ $relatedProduct->name }}</a>
                            </h3>
                            
                            <div class="mt-auto pt-4 flex items-center justify-between">
                                <div class="flex items-end">
                                    <span class="text-xl font-bold text-white">${{ number_format($relatedProduct->price, 2) }}</span>
                                    @if($relatedProduct->old_price)
                                        <span class="ml-2 text-xs text-gray-500 line-through">${{ number_format($relatedProduct->old_price, 2) }}</span>
                                    @endif
                                </div>
                                
                                <a href="{{ route('product.show', $relatedProduct->slug) }}" class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden rounded-full bg-gray-800 hover:bg-indigo-600 transition-colors group">
                                    <span class="relative text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

<script>
    // Color selection
    document.addEventListener('DOMContentLoaded', function() {
        const colorCircles = document.querySelectorAll('.color-circle');
        const colorOptions = document.querySelectorAll('.color-option');
        
        colorOptions.forEach(option => {
            const color = option.getAttribute('data-color');
            const circle = option.querySelector('.color-circle');
            circle.style.backgroundColor = color;
            
            option.addEventListener('click', function() {
                colorOptions.forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');
                
                const selectedColor = this.getAttribute('data-color');
                console.log('Selected color:', selectedColor);
            });
        });
        
        // Quantity handling
        const quantityInput = document.getElementById('quantity');
        const cartQuantityInput = document.getElementById('cart_quantity');
        
        quantityInput.addEventListener('change', function() {
            if (cartQuantityInput) {
                cartQuantityInput.value = this.value;
            }
        });
    });

    function incrementQuantity() {
        const input = document.getElementById('quantity');
        const cartQuantityInput = document.getElementById('cart_quantity');
        const newValue = parseInt(input.value) + 1;
        input.value = newValue;
        if (cartQuantityInput) {
            cartQuantityInput.value = newValue;
        }
    }
    
    function decrementQuantity() {
        const input = document.getElementById('quantity');
        const cartQuantityInput = document.getElementById('cart_quantity');
        if (parseInt(input.value) > 1) {
            const newValue = parseInt(input.value) - 1;
            input.value = newValue;
            if (cartQuantityInput) {
                cartQuantityInput.value = newValue;
            }
        }
    }
</script>

<style>
    .color-option.selected .color-circle {
        border-color: transparent;
        transform: scale(1.1);
        box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.2);
    }
</style>
@endsection 