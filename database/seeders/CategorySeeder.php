<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Audio',
                'description' => 'High-quality audio devices including headphones, speakers, and earbuds.',
                'image' => 'categories/audio.jpg',
            ],
            [
                'name' => 'Wearables',
                'description' => 'Smart devices you can wear, including smartwatches and fitness trackers.',
                'image' => 'categories/wearables.jpg',
            ],
            [
                'name' => 'Accessories',
                'description' => 'Essential tech accessories like chargers, cases, cables, and more.',
                'image' => 'categories/accessories.jpg',
            ],
            [
                'name' => 'Smart Home',
                'description' => 'Devices to make your home smarter, including speakers, displays, and hubs.',
                'image' => 'categories/smart-home.jpg',
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
                'image' => $category['image'],
            ]);
        }
    }
}
