<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get category IDs
        $audioId = Category::where('name', 'Audio')->first()->id;
        $wearablesId = Category::where('name', 'Wearables')->first()->id;
        $accessoriesId = Category::where('name', 'Accessories')->first()->id;
        $smartHomeId = Category::where('name', 'Smart Home')->first()->id;

        $products = [
            // Audio Products
            [
                'category_id' => $audioId,
                'name' => 'Wireless Headphones',
                'description' => 'High-quality wireless headphones with noise cancellation, 20-hour battery life, and premium sound experience. Perfect for music lovers and professionals.',
                'features' => "Active Noise Cancellation\nBluetooth 5.0 Connectivity\n20-Hour Battery Life\nPremium Sound Quality\nComfortable Over-Ear Design",
                'price' => 99.99,
                'old_price' => 129.99,
                'stock' => 50,
                'image' => 'products/wireless-headphones.jpg',
                'gallery' => json_encode(['products/wireless-headphones-1.jpg', 'products/wireless-headphones-2.jpg', 'products/wireless-headphones-3.jpg']),
                'featured' => true,
                'rating' => 4.8,
                'reviews_count' => 42,
                'colors' => json_encode(['black', 'white', 'blue']),
            ],
            [
                'category_id' => $audioId,
                'name' => 'Bluetooth Speaker',
                'description' => 'Portable Bluetooth speaker with powerful sound, waterproof design, and 12-hour battery life. Perfect for outdoor activities and parties.',
                'features' => "360° Sound\nWaterproof IPX7\n12-Hour Battery Life\nBuilt-in Microphone\nCompact Design",
                'price' => 79.99,
                'old_price' => null,
                'stock' => 35,
                'image' => 'products/bluetooth-speaker.jpg',
                'gallery' => json_encode(['products/bluetooth-speaker-1.jpg', 'products/bluetooth-speaker-2.jpg']),
                'featured' => true,
                'rating' => 4.5,
                'reviews_count' => 29,
                'colors' => json_encode(['black', 'blue', 'red']),
            ],
            [
                'category_id' => $audioId,
                'name' => 'Wireless Earbuds',
                'description' => 'True wireless earbuds with touch controls, 24-hour battery life with charging case, and sweat resistance. Perfect for workouts and daily use.',
                'features' => "True Wireless\nTouch Controls\n24-Hour Battery with Case\nSweat Resistant\nNoise Isolation",
                'price' => 69.99,
                'old_price' => 89.99,
                'stock' => 60,
                'image' => 'products/wireless-earbuds.jpg',
                'gallery' => json_encode(['products/wireless-earbuds-1.jpg', 'products/wireless-earbuds-2.jpg']),
                'featured' => false,
                'rating' => 4.7,
                'reviews_count' => 53,
                'colors' => json_encode(['black', 'white']),
            ],

            // Wearables Products
            [
                'category_id' => $wearablesId,
                'name' => 'Smart Watch',
                'description' => 'Advanced smartwatch with heart rate monitoring, step tracking, notifications, and 7-day battery life. Water-resistant and compatible with iOS and Android.',
                'features' => "Heart Rate Monitor\nStep & Activity Tracking\nSleep Monitoring\n7-Day Battery Life\nWater Resistant\niOS & Android Compatible",
                'price' => 159.99,
                'old_price' => 199.99,
                'stock' => 25,
                'image' => 'products/smart-watch.jpg',
                'gallery' => json_encode(['products/smart-watch-1.jpg', 'products/smart-watch-2.jpg']),
                'featured' => true,
                'rating' => 4.9,
                'reviews_count' => 38,
                'colors' => json_encode(['black', 'silver', 'rose gold']),
            ],
            [
                'category_id' => $wearablesId,
                'name' => 'Fitness Tracker',
                'description' => 'Slim fitness tracker with step counting, heart rate monitoring, and sleep tracking. Waterproof design with 14-day battery life.',
                'features' => "Step Tracking\nHeart Rate Monitor\nSleep Analysis\n14-Day Battery Life\nWaterproof\nPhone Notifications",
                'price' => 49.99,
                'old_price' => null,
                'stock' => 40,
                'image' => 'products/fitness-tracker.jpg',
                'gallery' => json_encode(['products/fitness-tracker-1.jpg', 'products/fitness-tracker-2.jpg']),
                'featured' => false,
                'rating' => 4.4,
                'reviews_count' => 27,
                'colors' => json_encode(['black', 'blue', 'pink']),
            ],

            // Accessories Products
            [
                'category_id' => $accessoriesId,
                'name' => 'Portable Charger',
                'description' => 'High-capacity 20,000mAh portable power bank with fast charging. Charge multiple devices simultaneously with USB-C and USB-A ports.',
                'features' => "20,000mAh Capacity\nFast Charging\nUSB-C & USB-A Ports\nCharge Multiple Devices\nCompact Design",
                'price' => 49.99,
                'old_price' => 59.99,
                'stock' => 70,
                'image' => 'products/portable-charger.jpg',
                'gallery' => json_encode(['products/portable-charger-1.jpg']),
                'featured' => false,
                'rating' => 4.6,
                'reviews_count' => 45,
                'colors' => json_encode(['black', 'white']),
            ],
            [
                'category_id' => $accessoriesId,
                'name' => 'Wireless Charging Pad',
                'description' => 'Qi-certified wireless charging pad compatible with all wireless charging-enabled devices. Sleek design with fast charging capability.',
                'features' => "Qi Certified\nFast Charging\nSlim Design\nLED Indicator\nOvercharge Protection",
                'price' => 29.99,
                'old_price' => null,
                'stock' => 55,
                'image' => 'products/wireless-charging-pad.jpg',
                'gallery' => json_encode(['products/wireless-charging-pad-1.jpg']),
                'featured' => false,
                'rating' => 4.3,
                'reviews_count' => 31,
                'colors' => json_encode(['black', 'white']),
            ],

            // Smart Home Products
            [
                'category_id' => $smartHomeId,
                'name' => 'Smart Speaker',
                'description' => 'Voice-controlled smart speaker with virtual assistant, premium sound, and smart home control capabilities.',
                'features' => "Voice Control\nVirtual Assistant\nPremium Sound\nSmart Home Control\nWi-Fi & Bluetooth",
                'price' => 89.99,
                'old_price' => 109.99,
                'stock' => 30,
                'image' => 'products/smart-speaker.jpg',
                'gallery' => json_encode(['products/smart-speaker-1.jpg', 'products/smart-speaker-2.jpg']),
                'featured' => true,
                'rating' => 4.7,
                'reviews_count' => 36,
                'colors' => json_encode(['black', 'white', 'gray']),
            ],
            [
                'category_id' => $smartHomeId,
                'name' => 'Smart Light Bulb',
                'description' => 'Wi-Fi enabled color-changing smart light bulb. Control with app or voice commands, set schedules and scenes.',
                'features' => "16 Million Colors\nApp Control\nVoice Command Compatible\nSchedules & Scenes\nEnergy Efficient",
                'price' => 19.99,
                'old_price' => 24.99,
                'stock' => 100,
                'image' => 'products/smart-light-bulb.jpg',
                'gallery' => json_encode(['products/smart-light-bulb-1.jpg']),
                'featured' => false,
                'rating' => 4.4,
                'reviews_count' => 22,
                'colors' => json_encode(['white']),
            ],
        ];

        foreach ($products as $product) {
            Product::create([
                'category_id' => $product['category_id'],
                'name' => $product['name'],
                'slug' => Str::slug($product['name']),
                'description' => $product['description'],
                'features' => $product['features'],
                'price' => $product['price'],
                'old_price' => $product['old_price'],
                'stock' => $product['stock'],
                'image' => $product['image'],
                'gallery' => $product['gallery'],
                'featured' => $product['featured'],
                'rating' => $product['rating'],
                'reviews_count' => $product['reviews_count'],
                'colors' => $product['colors'],
            ]);
        }
    }
}
