@extends('layouts.app')

@section('content')
<div class="bg-black min-h-screen relative">
    <!-- Abstract Background Shape -->
    <div class="absolute top-0 left-0 w-full h-64 bg-gradient-to-r from-indigo-900 to-purple-900 opacity-50 transform -skew-y-6 z-0"></div>

    <div class="container mx-auto px-4 pt-10 pb-24 relative z-10">
        <!-- Page Header with Animation -->
        <div class="text-center mb-16" data-aos="fade-up">
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-4 tracking-tight">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-500">Discover</span> Our Products
            </h1>
            <p class="text-gray-400 max-w-2xl mx-auto">Explore our curated selection of premium tech products, designed to elevate your digital lifestyle with innovation and style.</p>
        </div>
        
        <!-- Search and Filter Bar -->
        <div class="backdrop-blur-md bg-white/5 border border-white/10 rounded-xl p-6 mb-12 shadow-2xl transform transition-all duration-300 hover:shadow-indigo-500/10" data-aos="fade-up" data-aos-delay="100">
            <form action="{{ route('product.index') }}" method="GET" class="flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="w-full md:w-1/3 relative group">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-lg blur opacity-25 group-hover:opacity-40 transition duration-300"></div>
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..." 
                            class="w-full px-5 py-4 bg-gray-900 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-white placeholder-gray-500 transition-all duration-300">
                        <button type="submit" class="absolute right-3 top-4 text-gray-400 hover:text-indigo-400 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </button>
                    </div>
                </div>
                
                <div class="flex flex-wrap gap-4 w-full md:w-auto">
                    <div class="relative w-full md:w-auto">
                        <select name="category" class="mr-5 appearance-none w-full px-5 py-4 bg-gray-900 border border-gray-700 rounded-lg text-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-300" onchange="this.form.submit()">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                    
                    <div class="relative w-full md:w-auto">
                        <select name="sort" class="appearance-none w-full px-5 py-4 bg-gray-900 border border-gray-700 rounded-lg text-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all duration-300" onchange="this.form.submit()">
                            <option value="default" {{ request('sort') == 'default' || !request('sort') ? 'selected' : '' }}>Default Sorting</option>
                            <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                            <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Highest Rated</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        @if($products->isEmpty())
            <div class="backdrop-blur-md bg-white/5 border border-white/10 rounded-xl p-16 text-center" data-aos="fade-up">
                <div class="inline-block mb-6">
                    <svg class="w-16 h-16 text-gray-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-medium text-white mb-2">No products found</h3>
                <p class="text-gray-400 mb-8">We couldn't find any products matching your criteria.</p>
                <a href="{{ route('product.index') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-medium rounded-full hover:from-blue-600 hover:to-indigo-700 transition duration-300 transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    View All Products
                </a>
            </div>
        @else
            <!-- Product Count and View Toggle -->
            <div class="flex flex-wrap items-center justify-between mb-8 text-gray-400">
                <p data-aos="fade-right">Showing {{ $products->firstItem() }} - {{ $products->lastItem() }} of {{ $products->total() }} products</p>
                <div class="flex space-x-2" data-aos="fade-left">
                    <button id="grid-view" class="p-2 rounded text-indigo-400 bg-gray-900 border border-gray-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    </button>
                    <button id="list-view" class="p-2 rounded text-gray-500 hover:text-indigo-400 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8" id="products-container">
                @foreach($products as $product)
                <div class="group" data-aos="fade-up" data-aos-delay="{{ $loop->index % 4 * 100 }}">
                    <div class="relative bg-gradient-to-b from-gray-900 to-black rounded-xl overflow-hidden shadow-lg border border-gray-800 h-full flex flex-col transform transition-all duration-500 hover:shadow-2xl hover:border-indigo-500/30 hover:translate-y-[-5px]">
                        <div class="absolute top-3 right-3 z-10">
                            @if($product->old_price)
                                <span class="bg-gradient-to-r from-pink-500 to-rose-500 text-white text-xs font-bold px-3 py-1 rounded-full">
                                    {{ $product->discountPercentage() }}% OFF
                                </span>
                            @endif
                        </div>

                        <!-- Product Image with Hover Effect -->
                        <div class="relative overflow-hidden h-64">
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-60 transition-opacity z-10"></div>
                            
                            @if($product->name == 'Wireless Headphones')
                                <img src="https://images.unsplash.com/photo-1578319439584-104c94d37305?ixlib=rb-4.0.3&auto=format&fit=crop&w=1770&q=80" alt="{{ $product->name }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                            @elseif($product->name == 'Smart Watch')
                                <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1764&q=80" alt="{{ $product->name }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                            @elseif($product->name == 'Bluetooth Speaker')
                                <img src="https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1770&q=80" alt="{{ $product->name }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                            @elseif($product->name == 'Smart Speaker')
                                <img src="https://images.unsplash.com/photo-1512446816042-444d641267d4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1770&q=80" alt="{{ $product->name }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                            @elseif($product->name == 'Smart Light Bulb')
                                <img src="https://images.unsplash.com/photo-1711006155490-ec01a0ecf0de?q=80&w=2075&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="{{ $product->name }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                            @else
                                <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1764&q=80" alt="{{ $product->name }}" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                            @endif
                            
                            <div class="absolute bottom-0 left-0 right-0 overflow-hidden flex items-center transition-transform duration-300 transform translate-y-full group-hover:translate-y-0">
                                <div class="flex items-center w-full justify-center divide-x divide-gray-700 bg-black/70 backdrop-blur-sm py-3">
                                    <a href="{{ route('product.show', $product->slug) }}" class="flex-1 flex justify-center items-center text-gray-300 hover:text-white transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    </a>
                                    <form action="{{ route('cart.add') }}" method="POST" class="flex-1">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="w-full flex justify-center items-center text-gray-300 hover:text-white transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Product Info -->
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-xs px-2 py-1 bg-indigo-900/50 text-indigo-300 rounded-full">{{ $product->category->name }}</span>
                                <div class="flex items-center text-amber-400">
                                    <div class="flex">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $product->rating)
                                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>
                                            @else
                                                <svg class="w-4 h-4 fill-current text-gray-700" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path></svg>
                                            @endif
                                        @endfor
                                    </div>
                                    <span class="ml-1 text-xs text-gray-500">({{ $product->reviews_count }})</span>
                                </div>
                            </div>
                            
                            <h3 class="text-xl font-bold text-white mt-2 hover:text-indigo-400 transition-colors">
                                <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                            </h3>
                            
                            <p class="text-gray-400 text-sm mt-3 flex-grow line-clamp-2">{{ Str::limit($product->description, 100) }}</p>
                            
                            <div class="mt-6 flex items-center justify-between">
                                <div class="flex items-end">
                                    <span class="text-2xl font-bold text-white">${{ number_format($product->price, 2) }}</span>
                                    @if($product->old_price)
                                        <span class="ml-2 text-sm text-gray-500 line-through">${{ number_format($product->old_price, 2) }}</span>
                                    @endif
                                </div>
                                
                                <a href="{{ route('product.show', $product->slug) }}" class="relative inline-flex items-center justify-center w-12 h-12 overflow-hidden rounded-full bg-gray-800 hover:bg-indigo-600 transition-colors group">
                                    <span class="relative text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
            
            <!-- Pagination -->
            <div class="mt-16 flex justify-center" data-aos="fade-up">
                <div class="backdrop-blur-md bg-white/5 border border-white/10 rounded-full inline-flex overflow-hidden">
                    {{ $products->withQueryString()->links() }}
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Extra Animation Script for Grid/List View -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const gridViewBtn = document.getElementById('grid-view');
    const listViewBtn = document.getElementById('list-view');
    const productsContainer = document.getElementById('products-container');
    
    if (gridViewBtn && listViewBtn && productsContainer) {
        gridViewBtn.addEventListener('click', function() {
            productsContainer.classList.remove('grid-cols-1');
            productsContainer.classList.add('sm:grid-cols-2', 'lg:grid-cols-3', 'xl:grid-cols-4');
            gridViewBtn.classList.add('text-indigo-400', 'bg-gray-900', 'border', 'border-gray-800');
            gridViewBtn.classList.remove('text-gray-500', 'hover:text-indigo-400');
            listViewBtn.classList.remove('text-indigo-400', 'bg-gray-900', 'border', 'border-gray-800');
            listViewBtn.classList.add('text-gray-500', 'hover:text-indigo-400');
            
            // Play animations again
            const productItems = document.querySelectorAll('.group');
            productItems.forEach((item, index) => {
                item.setAttribute('data-aos-delay', (index % 4 * 100).toString());
                item.classList.add('aos-animate');
                void item.offsetWidth; // Force reflow
                item.classList.remove('aos-animate');
                setTimeout(() => {
                    item.classList.add('aos-animate');
                }, 10);
            });
        });
        
        listViewBtn.addEventListener('click', function() {
            productsContainer.classList.remove('sm:grid-cols-2', 'lg:grid-cols-3', 'xl:grid-cols-4');
            productsContainer.classList.add('grid-cols-1');
            listViewBtn.classList.add('text-indigo-400', 'bg-gray-900', 'border', 'border-gray-800');
            listViewBtn.classList.remove('text-gray-500', 'hover:text-indigo-400');
            gridViewBtn.classList.remove('text-indigo-400', 'bg-gray-900', 'border', 'border-gray-800');
            gridViewBtn.classList.add('text-gray-500', 'hover:text-indigo-400');
            
            // Play animations again
            const productItems = document.querySelectorAll('.group');
            productItems.forEach((item, index) => {
                item.setAttribute('data-aos-delay', (index * 100).toString());
                item.classList.add('aos-animate');
                void item.offsetWidth; // Force reflow
                item.classList.remove('aos-animate');
                setTimeout(() => {
                    item.classList.add('aos-animate');
                }, 10);
            });
        });
    }
});
</script>

<style>
/* Enhance pagination styles */
.pagination {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
}

.pagination li {
    display: inline-flex;
}

.pagination li .page-link,
.pagination li .page-text {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 40px;
    min-width: 40px;
    padding: 0 10px;
    color: #d1d5db;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.3s;
}

.pagination li .page-link {
    color: #d1d5db;
}

.pagination li.active .page-link {
    background: linear-gradient(to right, #3b82f6, #6366f1);
    color: white;
    position: relative;
    z-index: 1;
}

.pagination li .page-link:hover:not(.active) {
    color: white;
    background-color: rgba(255, 255, 255, 0.1);
}

/* Line clamp utility */
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection 