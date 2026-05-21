<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $tickets       = FaqCategory::where('slug', 'tickets')->first();
        $accommodation = FaqCategory::where('slug', 'accommodation')->first();
        $atFestival    = FaqCategory::where('slug', 'at-the-festival')->first();
        $music         = FaqCategory::where('slug', 'music-lineup')->first();

        $faqs = [
            [
                'faq_category_id' => $tickets?->id,
                'question'        => 'When and where does Tomorrowland take place?',
                'answer'          => 'Tomorrowland is held in Boom, Belgium, during the last two weekends of July each year. The festival grounds — known as "De Schorre" — transform into a breathtaking world for the duration of the event.',
                'sort_order'      => 1,
                'is_active'       => true,
            ],
            [
                'faq_category_id' => $tickets?->id,
                'question'        => 'How can I buy tickets?',
                'answer'          => 'Tickets are sold exclusively through the official Tomorrowland website. There is a global pre-sale registration phase, followed by a public sale. We strongly recommend registering early as tickets sell out within minutes.',
                'sort_order'      => 2,
                'is_active'       => true,
            ],
            [
                'faq_category_id' => $accommodation?->id,
                'question'        => 'What accommodation options are available?',
                'answer'          => 'Tomorrowland offers the legendary DreamVille on-site camping experience, with accommodation ranging from basic tents to luxury comfort packages. Nearby hotels and shuttle services are also available.',
                'sort_order'      => 1,
                'is_active'       => true,
            ],
            [
                'faq_category_id' => $atFestival?->id,
                'question'        => 'Can I bring my own food or drinks?',
                'answer'          => 'Outside food and beverages are not permitted inside the festival grounds. Tomorrowland offers a wide variety of high-quality food vendors, restaurants, and themed bars to choose from.',
                'sort_order'      => 1,
                'is_active'       => true,
            ],
            [
                'faq_category_id' => $atFestival?->id,
                'question'        => 'Is Tomorrowland family friendly?',
                'answer'          => 'The main festival is strictly for guests aged 18 and above. However, Tomorrowland organises special family-oriented events and activities throughout the year.',
                'sort_order'      => 2,
                'is_active'       => true,
            ],
            [
                'faq_category_id' => $music?->id,
                'question'        => 'What music genres are featured?',
                'answer'          => 'The festival primarily showcases electronic dance music — including techno, house, trance, and drum & bass — across 15+ stages. The diverse lineup ensures there is something for every electronic music lover.',
                'sort_order'      => 1,
                'is_active'       => true,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
