<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post\Reponse;
use Database\Seeders\TagSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\ImageSeeder;
use Database\Seeders\CommentSeeder;
use Database\Seeders\ReponseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            TagSeeder::class,
            ImageSeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
            ReponseSeeder::class,
        ]);
    }
}
