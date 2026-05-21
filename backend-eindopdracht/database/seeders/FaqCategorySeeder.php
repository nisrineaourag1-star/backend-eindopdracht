<?php

namespace Database\Seeders;

use App\Models\FaqCategory;
use Illuminate\Database\Seeder;

class FaqCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Tickets & Registration', 'slug' => 'tickets'],
            ['name' => 'Accommodation',           'slug' => 'accommodation'],
            ['name' => 'At the Festival',         'slug' => 'at-the-festival'],
            ['name' => 'Music & Lineup',          'slug' => 'music-lineup'],
        ];

        foreach ($categories as $cat) {
            FaqCategory::create($cat);
        }
    }
}
