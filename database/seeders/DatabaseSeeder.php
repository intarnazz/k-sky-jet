<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Service;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Way;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Factory::create();


        $files = Storage::disk('public')->files('ava');

        $image = Image::create([
            'path' => $files[0],
        ]);
        $user = User::create([
            'login' => 'admin',
            'email' => 'admin.admin@gmail.com',
            'phone' => '8 999 999 9999',
            'password' => '123',
            'image_id' => $image->id,
        ]);


        $users = [];
        foreach ($files as $file) {
            $image = Image::create([
                'path' => $file,
            ]);
            $users[] = User::create([
                'login' => $faker->unique()->userName,
                'email' => $faker->unique()->email,
                'phone' => '8 999 999 9999',
                'password' => '123',
                'image_id' => $image->id,
            ]);
        }

        $files = Storage::disk('public')->files();
        for ($i = 0; $i < 4; $i++) {
            foreach ($files as $file) {
                $image = Image::create([
                    'path' => $file,
                ]);
                $departure_time = $faker->dateTimeBetween('now', '+3 days');
                $way = Way::create([
                    'image_id' => $image->id,
                    'route' => $faker->word,
                    'views' => 0,
                    'description' => $faker->text(200),
                    'departure_time' => $departure_time,
                    'arrival_time' => (clone $departure_time)->modify('+' . rand(1, 8) . ' hours'),
                    'price' => $faker->randomFloat(0, 2000, 20000),
                    'class' => $faker->randomElement(['economy', 'business', 'first']),
                ]);

                Booking::create([
                    'way_id' => $way->id,
                    'user_id' => $user->id,
                    'status' => 'status',
                    'total_price' => $way->price,
                    'phone' => $faker->phoneNumber(),
                    'special_requests' => 'Место у окна',
                ]);

                Comment::create([
                    'way_id' => $way->id,
                    'user_id' => $users[0]->id,
                    'rating' => $faker->randomFloat(0, 0, 5),
                    'comment' => 'Я рыба ёж 🐟',
                ]);
                Comment::create([
                    'way_id' => $way->id,
                    'user_id' => $users[1]->id,
                    'rating' => $faker->randomFloat(0, 0, 5),
                    'comment' => 'Я жопич',
                ]);
                $service = Service::create([
                    'name' => $faker->unique()->word,
                    'views' => 0,
                    'type' => $faker->randomElement(['VIP', 'transfers', 'rentals']),
                    'description' => $faker->text(200),
                    'price' => $faker->randomFloat(0, 2000, 20000),
                ]);
                for ($j = 0; $j < 4; $j++) {
                    Image::create([
                        'service_id' => $service->id,
                        'path' => $file,
                    ]);
                }
            }
        }
    }
}
