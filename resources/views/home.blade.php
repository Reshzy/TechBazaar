@extends('layouts.app')

@section('content')
<div class="overflow-hidden">
    <!-- Hero Section with Parallax Effect -->
    <section class="relative h-screen flex items-center overflow-hidden bg-gradient-to-r from-blue-900 via-indigo-900 to-purple-900">
        <div class="absolute w-full h-full">
            <div class="absolute inset-0 bg-black opacity-40"></div>
            <img src="https://images.unsplash.com/photo-1550745165-9bc0b252726f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Background" class="w-full h-full object-cover">
        </div>
        
        <div class="container mx-auto px-4 z-10 py-24">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="text-white space-y-6" data-aos="fade-up" data-aos-delay="200">
                    <h1 class="text-5xl md:text-7xl font-bold leading-tight tracking-tighter" data-aos="fade-right" data-aos-delay="300">
                        The Future<br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">of Tech</span><br>
                        Is Here
                    </h1>
                    <p class="text-xl opacity-80 max-w-md" data-aos="fade-up" data-aos-delay="400">Discover premium tech gadgets designed for the modern lifestyle. Innovative, sleek, and powerful.</p>
                    <div class="flex flex-wrap gap-4 pt-4" data-aos="fade-up" data-aos-delay="500">
                        <a href="{{ route('product.index') }}" class="px-8 py-3 bg-white text-indigo-900 rounded-full font-semibold hover:bg-opacity-90 transition duration-300 transform hover:scale-105 flex items-center group">
                            Explore Products
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                        <a href="#categories" class="px-8 py-3 bg-transparent border border-white text-white rounded-full font-semibold hover:bg-white hover:text-indigo-900 transition duration-300">
                            Discover
                        </a>
                    </div>
                </div>
                <div class="hidden md:block" data-aos="zoom-in" data-aos-delay="400">
                    <div class="relative">
                        <div class="absolute -inset-1 bg-gradient-to-r from-pink-600 to-purple-600 rounded-full blur opacity-50 animate-pulse"></div>
                        <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Featured Product" class="relative rounded-full shadow-2xl transform hover:scale-105 transition duration-700">
                    </div>
                </div>
            </div>
            
            <div class="absolute bottom-10 left-0 right-0 flex justify-center" data-aos="fade-up" data-aos-delay="700">
                <a href="#categories" class="animate-bounce bg-white p-2 w-10 h-10 ring-1 ring-slate-200 shadow-lg rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-indigo-900" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Categories with Horizontal Scroll -->
    <section id="categories" class="py-24 bg-gradient-to-b from-gray-900 to-gray-950">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12">
                <div data-aos="fade-up">
                    <h2 class="text-3xl md:text-4xl font-bold text-white">Explore <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-400">Categories</span></h2>
                    <p class="text-gray-400 mt-3 max-w-xl">Discover our curated collection of premium tech products, carefully selected for every need.</p>
                </div>
                <div data-aos="fade-left" data-aos-delay="200">
                    <div class="flex space-x-2 mt-4 md:mt-0">
                        <button id="scroll-left" class="p-2 rounded-full bg-gray-800 text-white hover:bg-indigo-700 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button id="scroll-right" class="p-2 rounded-full bg-gray-800 text-white hover:bg-indigo-700 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="overflow-x-auto hide-scrollbar">
                <div id="categories-container" class="flex space-x-6 py-4 transition-transform duration-500 ease-in-out" style="min-width: max-content;">
                    @foreach($categories as $category)
                    <a href="{{ route('product.index', ['category' => $category->slug]) }}" class="group" data-aos="flip-left" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="bg-gradient-to-tr from-gray-800 to-gray-900 h-80 w-64 rounded-xl overflow-hidden relative transform transition-all duration-500 hover:scale-105 hover:shadow-2xl">
                            <div class="absolute inset-0 bg-black opacity-20 group-hover:opacity-0 transition"></div>
                            @if($category->name == 'Audio')
                            <img src="https://images.unsplash.com/photo-1546435770-a3e426bf472b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1665&q=80" 
                                 alt="{{ $category->name }}" 
                                 class="h-full w-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                            @elseif($category->name == 'Wearables')
                            <img src="https://images.unsplash.com/photo-1508685096489-7aacd43bd3b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1674&q=80" 
                                 alt="{{ $category->name }}" 
                                 class="h-full w-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                            @elseif($category->name == 'Smart Home')
                            <img src="https://images.unsplash.com/photo-1558002038-1055907df827?ixlib=rb-4.0.3&auto=format&fit=crop&w=1742&q=80" 
                                 alt="{{ $category->name }}" 
                                 class="h-full w-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                            @elseif($category->name == 'Accessories')
                            <img src="https://images.unsplash.com/photo-1624823183493-ed5832f48f18?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                                 alt="{{ $category->name }}" 
                                 class="h-full w-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                            @else
                            <img src="https://images.unsplash.com/photo-1573739122661-d7dfb4e6ab9b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1742&q=80" 
                                 alt="{{ $category->name }}" 
                                 class="h-full w-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-6">
                                <h3 class="text-2xl font-bold text-white">{{ $category->name }}</h3>
                                <div class="flex items-center mt-2">
                                    <span class="text-gray-300 text-sm">Explore Collection</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 text-white opacity-0 group-hover:opacity-100 group-hover:translate-x-1 transition-all duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products in Grid -->
    <section class="py-24 bg-gradient-to-b from-gray-950 to-black">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="text-indigo-500 font-medium tracking-widest uppercase" data-aos="fade-down" data-aos-delay="100">Premium Selection</span>
                <h2 class="text-3xl md:text-4xl font-bold text-white mt-2" data-aos="fade-up" data-aos-delay="200">Featured Products</h2>
                <p class="text-gray-400 mt-4" data-aos="fade-up" data-aos-delay="300">Discover our most popular products, carefully selected for their exceptional quality and innovative features.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($featuredProducts as $product)
                <div class="group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="bg-gradient-to-tr from-gray-800 to-gray-900 rounded-xl overflow-hidden transition-all duration-500 hover:shadow-2xl h-full flex flex-col">
                        <div class="overflow-hidden relative">
                            <div class="absolute top-4 right-4 z-10">
                                @if($product->old_price)
                                    <span class="inline-flex items-center justify-center px-3 py-1 bg-red-500 text-white text-xs font-medium rounded-full">
                                        {{ $product->discountPercentage() }}% OFF
                                    </span>
                                @endif
                            </div>
                            @if($product->name == 'Wireless Headphones')
                            <img src="https://images.unsplash.com/photo-1578319439584-104c94d37305?ixlib=rb-4.0.3&auto=format&fit=crop&w=1770&q=80" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-64 object-cover transform transition duration-700 group-hover:scale-110">
                            @elseif($product->name == 'Smart Watch')
                            <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1764&q=80" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-64 object-cover transform transition duration-700 group-hover:scale-110">
                            @elseif($product->name == 'Bluetooth Speaker')
                            <img src="https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1770&q=80" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-64 object-cover transform transition duration-700 group-hover:scale-110">
                            @elseif($product->name == 'Smart Speaker')
                            <img src="https://images.unsplash.com/photo-1512446816042-444d641267d4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1770&q=80" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-64 object-cover transform transition duration-700 group-hover:scale-110">
                            @else
                            <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1764&q=80" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-64 object-cover transform transition duration-700 group-hover:scale-110">
                            @endif
                        </div>
                        
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="mb-2 flex items-center">
                                <span class="bg-indigo-500 bg-opacity-20 text-indigo-300 text-xs rounded-full px-2 py-1">{{ $product->category->name }}</span>
                                <div class="flex text-yellow-400 ml-auto">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $product->rating)
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>
                                        @else
                                            <svg class="w-4 h-4 fill-current text-gray-600" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            
                            <h3 class="text-xl font-bold text-white">{{ $product->name }}</h3>
                            <p class="text-gray-400 text-sm mt-2 line-clamp-2 flex-grow">{{ $product->description }}</p>
                            
                            <div class="mt-4 flex items-center justify-between">
                                <div>
                                    <span class="text-white text-xl font-bold">${{ number_format($product->price, 2) }}</span>
                                    @if($product->old_price)
                                        <span class="ml-2 text-gray-500 text-sm line-through">${{ number_format($product->old_price, 2) }}</span>
                                    @endif
                                </div>
                                <a href="{{ route('product.show', $product->slug) }}" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-indigo-500 hover:bg-indigo-600 transition text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="mt-12 text-center" data-aos="zoom-in" data-aos-delay="200">
                <a href="{{ route('product.index') }}" class="inline-flex items-center px-8 py-4 bg-indigo-600 hover:bg-indigo-700 rounded-full text-white font-medium transition duration-300 transform hover:scale-105 group">
                    View All Products
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Special Offer Banner with Parallax -->
    <section class="py-24 relative overflow-hidden bg-gradient-to-r from-indigo-900 to-purple-900">
        <div class="absolute inset-0" style="background-image: url(&apos;https://images.unsplash.com/photo-1612613900900-d822e5677096?ixlib=rb-4.0.3&auto=format&fit=crop&w=1772&q=80&apos;); background-size: cover; background-position: center; background-attachment: fixed; opacity: 0.2;"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col md:flex-row items-center justify-between max-w-6xl mx-auto">
                <div class="md:w-1/2 space-y-6 text-center md:text-left" data-aos="fade-right" data-aos-duration="1200">
                    <span class="inline-block bg-indigo-500 bg-opacity-20 text-indigo-300 text-sm rounded-full px-4 py-1.5 tracking-wide" data-aos="fade-down" data-aos-delay="100">LIMITED TIME OFFER</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-white leading-tight" data-aos="fade-up" data-aos-delay="200">Get 20% off<br>Premium Audio</h2>
                    <p class="text-gray-300 max-w-md" data-aos="fade-up" data-aos-delay="300">Experience crystal-clear sound with our premium audio collection. Limited time offer with free shipping on all orders.</p>
                    <div class="flex flex-wrap gap-4 pt-2 justify-center md:justify-start" data-aos="fade-up" data-aos-delay="400">
                        <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-4 flex flex-col items-center" data-aos="flip-left" data-aos-delay="500">
                            <span class="text-3xl font-bold text-white">AUDIO20</span>
                            <span class="text-xs text-gray-300 mt-1">USE CODE AT CHECKOUT</span>
                        </div>
                        <a href="{{ route('product.index', ['category' => 'audio']) }}" class="self-center px-8 py-4 bg-white text-indigo-900 rounded-full font-semibold hover:bg-opacity-90 transition duration-300 transform hover:scale-105 flex items-center group">
                            Shop Now
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="mt-12 md:mt-0 md:w-1/2 flex justify-center" data-aos="fade-left" data-aos-duration="1200">
                    <div class="relative">
                        <div class="absolute -inset-4 bg-gradient-to-r from-pink-600 to-purple-600 rounded-full blur opacity-50"></div>
                        <img src="https://images.unsplash.com/photo-1577174881658-0f30ed549adc?ixlib=rb-4.0.3&auto=format&fit=crop&w=1974&q=80" alt="Premium Headphones" class="relative rounded-full w-64 h-64 md:w-80 md:h-80 object-cover shadow-2xl transform hover:rotate-6 transition duration-700">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials with Modern Design -->
    <section class="py-24 bg-black">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="text-indigo-500 font-medium tracking-widest uppercase" data-aos="fade-down" data-aos-delay="100">Why Choose Us</span>
                <h2 class="text-3xl md:text-4xl font-bold text-white mt-2" data-aos="fade-up" data-aos-delay="200">What Our Customers Say</h2>
                <p class="text-gray-400 mt-4" data-aos="fade-up" data-aos-delay="300">Don't just take our word for it – hear what our customers have to say about their TechBazaar experience.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($testimonials as $testimonial)
                <div class="group" data-aos="{{ $loop->iteration % 3 == 1 ? 'fade-right' : ($loop->iteration % 3 == 2 ? 'fade-up' : 'fade-left') }}" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="bg-gradient-to-tr from-gray-900 to-gray-800 p-8 rounded-xl overflow-hidden relative border border-gray-800 h-full transform transition-all duration-500 hover:border-indigo-500 hover:shadow-xl hover:shadow-indigo-500/10">
                        <div class="flex text-yellow-400 mb-6">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $testimonial['rating'])
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>
                                @else
                                    <svg class="w-5 h-5 fill-current text-gray-700" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>
                                @endif
                            @endfor
                        </div>
                        
                        <div class="mb-8">
                            <svg class="w-10 h-10 text-indigo-500 opacity-20" fill="currentColor" viewBox="0 0 32 32">
                                <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z"></path>
                            </svg>
                        </div>
                        
                        <p class="text-gray-300 mb-8 leading-relaxed">"{{ $testimonial['text'] }}"</p>
                        
                        <div class="flex items-center">
                            <div class="h-12 w-12 rounded-full bg-gradient-to-r from-indigo-500 to-purple-500 flex items-center justify-center text-white font-bold text-lg">
                                {{ $testimonial['initials'] }}
                            </div>
                            <div class="ml-4">
                                <h4 class="text-white font-semibold">{{ $testimonial['name'] }}</h4>
                                <p class="text-gray-500 text-sm">Verified Customer</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-20 bg-gradient-to-r from-indigo-900 to-purple-900 relative overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-full bg-[url(&apos;https://images.unsplash.com/photo-1550745165-9bc0b252726f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80&apos;)] bg-cover bg-center opacity-10"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-xl mx-auto text-center" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4" data-aos="zoom-in" data-aos-delay="100">Stay Updated</h2>
                <p class="text-gray-300 mb-8" data-aos="fade-up" data-aos-delay="200">Subscribe to our newsletter for the latest product releases, exclusive offers, and tech insights.</p>
                
                <form class="flex flex-col sm:flex-row gap-4" data-aos="fade-up" data-aos-delay="300">
                    <input type="email" placeholder="Enter your email" class="flex-grow px-6 py-4 rounded-full bg-white bg-opacity-10 backdrop-blur-sm border border-white border-opacity-20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                    <button type="submit" class="px-8 py-4 bg-white text-indigo-900 rounded-full font-semibold hover:bg-opacity-90 transition duration-300">
                        Subscribe
                    </button>
                </form>
                
                <p class="text-gray-400 text-sm mt-4" data-aos="fade-up" data-aos-delay="400">We respect your privacy. Unsubscribe at any time.</p>
            </div>
        </div>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Setup AOS animation library
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 1000,
            once: true,
            easing: 'ease-out-cubic',
            offset: 50
        });
    }
    
    // Category horizontal scroll
    const container = document.getElementById('categories-container');
    const scrollLeftBtn = document.getElementById('scroll-left');
    const scrollRightBtn = document.getElementById('scroll-right');
    
    if (container && scrollLeftBtn && scrollRightBtn) {
        const scrollAmount = 300;
        
        scrollLeftBtn.addEventListener('click', () => {
            container.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        });
        
        scrollRightBtn.addEventListener('click', () => {
            container.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });
    }
});
</script>

<style>
/* Hide scrollbar but allow scrolling */
.hide-scrollbar {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */
}

.hide-scrollbar::-webkit-scrollbar {
    display: none;  /* Chrome, Safari and Opera */
}

/* Line clamp for product descriptions */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection 