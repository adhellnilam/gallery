<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Food', 'description' => 'Find more delicious food', 'datecreated' => now(), 'user_id' => User::inRandomOrder()->first()->id],
            ['name' => 'Art', 'description' => 'Find more great art', 'datecreated' => now(), 'user_id' => User::inRandomOrder()->first()->id],
            ['name' => 'Travel', 'description' => 'Find more nice travel', 'datecreated' => now(), 'user_id' => User::inRandomOrder()->first()->id],
            ['name' => 'Animals', 'description' => 'Find more cute animals', 'datecreated' => now(), 'user_id' => User::inRandomOrder()->first()->id],
            ['name' => 'Photography', 'description' => 'Find more pretty photography', 'datecreated' => now(), 'user_id' => User::inRandomOrder()->first()->id],
        ];
    
        foreach ($data as $item) {
            Album::insert([
                'name' => $item['name'],
                'description' => $item['description'],
                'datecreated' => $item['datecreated'],
                'user_id' => $item['user_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
