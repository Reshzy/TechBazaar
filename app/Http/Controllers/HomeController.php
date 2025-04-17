<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     */
    public function index()
    {
        // Get featured products
        $featuredProducts = Product::where('featured', true)
            ->orderBy('rating', 'desc')
            ->take(4)
            ->get();
            
        // Get product categories
        $categories = Category::all();
        
        // Get testimonials (in a real app, these might come from a database)
        $testimonials = [
            [
                'name' => 'Rodge Andru Viloria',
                'initials' => 'RV',
                'text' => 'The wireless headphones I purchased from TechBazaar are amazing! Great sound quality and comfortable to wear for extended periods.',
                'rating' => 5,
            ],
            [
                'name' => 'Jose Rizal',
                'initials' => 'JR',
                'text' => 'Fast shipping and excellent customer service. My smartwatch arrived earlier than expected and works perfectly.',
                'rating' => 5,
            ],
            [
                'name' => 'Cardo Dalisay',
                'initials' => 'CD',
                'text' => 'The bluetooth speaker has amazing sound quality. Perfect for outdoor gatherings. Battery life is impressive too!',
                'rating' => 4,
            ],
        ];
        
        return view('home', compact('featuredProducts', 'categories', 'testimonials'));
    }
}
