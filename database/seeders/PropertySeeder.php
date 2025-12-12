<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Property;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = [
            [
                'title' => 'Luxury Apartment - Karachi',
                'description' => 'A luxurious apartment located in the heart of DHA Phase 6, Karachi. Features modern amenities, spacious rooms, and beautiful city views.',
                'type' => 'apartment',
                'bedrooms' => 2,
                'bathrooms' => 2,
                'size' => 1200,
                'location' => 'DHA Phase 6',
                'city' => 'Karachi',
                'price' => 120000,
                'price_type' => 'month',
                'image_url' => 'https://www.nation.com.pk/digital_images/large/2016-02-18/4-reasons-why-apartment-living-is-popular-in-karachi-1455810590-9378.jpg',
                'is_available' => true,
            ],
            [
                'title' => 'Family House - Lahore',
                'description' => 'Spacious family house in Model Town, Lahore. Perfect for large families with a beautiful garden and modern facilities.',
                'type' => 'house',
                'bedrooms' => 3,
                'bathrooms' => 3,
                'size' => 2500,
                'location' => 'Model Town',
                'city' => 'Lahore',
                'price' => 180000,
                'price_type' => 'month',
                'image_url' => 'https://images.unsplash.com/photo-1560185127-6ed189bf02f4',
                'is_available' => true,
            ],
            [
                'title' => 'Office Space - Islamabad',
                'description' => 'Modern office space in Blue Area, Islamabad. Ideal for corporate offices with high-speed internet and parking facilities.',
                'type' => 'office',
                'bedrooms' => null,
                'bathrooms' => 2,
                'size' => 1200,
                'location' => 'Blue Area',
                'city' => 'Islamabad',
                'price' => 250000,
                'price_type' => 'month',
                'image_url' => 'https://smartbenefits.pk/wp-content/uploads/2024/01/KickStart-Co-Working-Space-in-Islamabad-1024x768-1.jpg',
                'is_available' => true,
            ],
            [
                'title' => 'Modern Apartment - Karachi',
                'description' => 'Beautiful modern apartment in Clifton with sea view. Features 1 bedroom, fully furnished with modern kitchen.',
                'type' => 'apartment',
                'bedrooms' => 1,
                'bathrooms' => 1,
                'size' => 800,
                'location' => 'Clifton Block 8',
                'city' => 'Karachi',
                'price' => 85000,
                'price_type' => 'month',
                'image_url' => 'https://pakflagproperties.com/wp-content/uploads/2022/03/arby-towers-bahria-town-karachi.jpg',
                'is_available' => true,
            ],
            [
                'title' => 'Luxury Villa - Lahore',
                'description' => 'Magnificent luxury villa in Gulberg with 5 bedrooms, swimming pool, and beautiful garden. Perfect for elite living.',
                'type' => 'villa',
                'bedrooms' => 5,
                'bathrooms' => 6,
                'size' => 5000,
                'location' => 'Gulberg',
                'city' => 'Lahore',
                'price' => 350000,
                'price_type' => 'month',
                'image_url' => 'https://media.zameen.com/thumbnails/218488382-800x600.jpeg',
                'is_available' => true,
            ],
            [
                'title' => 'Corporate Office - Islamabad',
                'description' => 'Large corporate office space in G-11 Markaz. Fully furnished with conference rooms and reception area.',
                'type' => 'office',
                'bedrooms' => null,
                'bathrooms' => 3,
                'size' => 1800,
                'location' => 'G-11 Markaz',
                'city' => 'Islamabad',
                'price' => 280000,
                'price_type' => 'month',
                'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbSJL3XBTP9kTwTMeSW74lKJWliN2YTdIPSQ&s',
                'is_available' => true,
            ],
            [
                'title' => 'Studio Apartment - Karachi',
                'description' => 'Compact and modern studio apartment in Bahria Town Karachi. Perfect for singles or couples.',
                'type' => 'apartment',
                'bedrooms' => 1,
                'bathrooms' => 1,
                'size' => 600,
                'location' => 'Bahria Town',
                'city' => 'Karachi',
                'price' => 45000,
                'price_type' => 'month',
                'image_url' => 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00',
                'is_available' => true,
            ],
            [
                'title' => 'Commercial Shop - Lahore',
                'description' => 'Prime location commercial shop in Liberty Market. Ideal for retail business with high foot traffic.',
                'type' => 'office',
                'bedrooms' => null,
                'bathrooms' => 1,
                'size' => 500,
                'location' => 'Liberty Market',
                'city' => 'Lahore',
                'price' => 150000,
                'price_type' => 'month',
                'image_url' => 'https://images.unsplash.com/photo-1567496898669-ee935f003f30',
                'is_available' => true,
            ],
            [
                'title' => 'Weekly Rental Apartment - Islamabad',
                'description' => 'Fully furnished apartment available for weekly rental in F-10. Perfect for short stays or business trips.',
                'type' => 'apartment',
                'bedrooms' => 2,
                'bathrooms' => 2,
                'size' => 1000,
                'location' => 'F-10',
                'city' => 'Islamabad',
                'price' => 35000,
                'price_type' => 'week',
                'image_url' => 'https://images.unsplash.com/photo-1518780664697-55e3ad937233',
                'is_available' => true,
            ],
            [
                'title' => 'Daily Rental Villa - Karachi',
                'description' => 'Luxury villa available for daily rental in Sea View. Perfect for events, parties, or short luxurious stays.',
                'type' => 'villa',
                'bedrooms' => 4,
                'bathrooms' => 4,
                'size' => 4000,
                'location' => 'Sea View',
                'city' => 'Karachi',
                'price' => 25000,
                'price_type' => 'day',
                'image_url' => 'https://images.unsplash.com/photo-1613977257363-707ba9348227',
                'is_available' => true,
            ],
            [
                'title' => 'Penthouse - Lahore',
                'description' => 'Stunning penthouse with panoramic city views in Defence Lahore. Features private pool and rooftop garden.',
                'type' => 'apartment',
                'bedrooms' => 3,
                'bathrooms' => 3,
                'size' => 3000,
                'location' => 'Defence Phase 5',
                'city' => 'Lahore',
                'price' => 500000,
                'price_type' => 'month',
                'image_url' => 'https://images.unsplash.com/photo-1613490493576-7fde63acd811',
                'is_available' => false,
            ],
            [
                'title' => 'Co-working Space - Islamabad',
                'description' => 'Modern co-working space with high-speed internet, meeting rooms, and coffee station. Perfect for startups and freelancers.',
                'type' => 'office',
                'bedrooms' => null,
                'bathrooms' => 2,
                'size' => 800,
                'location' => 'F-7',
                'city' => 'Islamabad',
                'price' => 20000,
                'price_type' => 'week',
                'image_url' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72',
                'is_available' => true,
            ],
        ];

        foreach ($properties as $property) {
            Property::create($property);
        }

        $this->command->info('✅ ' . count($properties) . ' properties seeded successfully!');
        
        // Display a summary
        $this->command->info("\n📊 Property Summary:");
        $this->command->info("==================");
        $this->command->info("Karachi: " . Property::where('city', 'Karachi')->count() . " properties");
        $this->command->info("Lahore: " . Property::where('city', 'Lahore')->count() . " properties");
        $this->command->info("Islamabad: " . Property::where('city', 'Islamabad')->count() . " properties");
        $this->command->info("\n🏠 Type Summary:");
        $this->command->info("Apartments: " . Property::where('type', 'apartment')->count());
        $this->command->info("Houses: " . Property::where('type', 'house')->count());
        $this->command->info("Villas: " . Property::where('type', 'villa')->count());
        $this->command->info("Offices: " . Property::where('type', 'office')->count());
        $this->command->info("\n💰 Price Types:");
        $this->command->info("Monthly: " . Property::where('price_type', 'month')->count());
        $this->command->info("Weekly: " . Property::where('price_type', 'week')->count());
        $this->command->info("Daily: " . Property::where('price_type', 'day')->count());
        $this->command->info("\n✅ Available: " . Property::where('is_available', true)->count());
        $this->command->info("❌ Not Available: " . Property::where('is_available', false)->count());
    }
}