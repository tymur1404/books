<?php

namespace Database\Seeders;


use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Author::factory()
            ->count(50)
            ->create();

        Book::factory()
            ->count(50)
            ->hasAuthors(3)
            ->create();
    }
}
