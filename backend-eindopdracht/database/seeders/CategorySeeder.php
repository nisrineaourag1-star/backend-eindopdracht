<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Lineup',            'slug' => 'lineup'],
            ['name' => 'Updates',           'slug' => 'updates'],
            ['name' => 'Behind the Scenes', 'slug' => 'behind-the-scenes'],
            ['name' => 'Community',         'slug' => 'community'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
