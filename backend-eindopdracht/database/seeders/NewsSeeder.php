<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $lineup       = Category::where('slug', 'lineup')->first();
        $updates      = Category::where('slug', 'updates')->first();
        $behind       = Category::where('slug', 'behind-the-scenes')->first();
        $community    = Category::where('slug', 'community')->first();
        $admin        = User::where('email', 'admin@ehb.be')->first();

        $articles = [
            [
                'title'        => 'Headliners Announced for the 2026 Edition',
                'slug'         => 'headliners-announced-2026',
                'excerpt'      => 'The biggest names in electronic music are confirmed for Tomorrowland 2026. The wait is finally over.',
                'body'         => "We are thrilled to announce the headline acts for the 2026 edition of Tomorrowland. After months of anticipation, the world's most iconic electronic music artists are confirmed to take the stage in Boom, Belgium.\n\nThis year's lineup features legends of techno, house, and trance alongside some of the most exciting newcomers in the global EDM scene. Each stage will offer a unique sonic journey, curated to perfection by our artistic team.\n\nTickets are available through the standard pre-sale registration. Make sure you register before the deadline to secure your spot at the world's greatest festival.",
                'is_published' => true,
                'published_at' => now()->subDays(5),
                'user_id'      => $admin->id,
                'category_id'  => $lineup?->id,
            ],
            [
                'title'        => 'Global Ticket Sale Opens Next Friday',
                'slug'         => 'global-ticket-sale-2026',
                'excerpt'      => 'Register now to get early access to the global pre-sale. Spots are extremely limited.',
                'body'         => "The global ticket sale for Tomorrowland 2026 opens next Friday at 17:00 CET. This year we are introducing a new fair queuing system to give everyone an equal chance of securing their tickets.\n\nTo participate in the pre-sale, you must register your details on the official Tomorrowland website before Thursday midnight. Registered users will receive a unique access code via email on Friday morning.\n\nWe strongly advise having your payment details ready in advance. Tickets typically sell out within 30 minutes of the sale opening.",
                'is_published' => true,
                'published_at' => now()->subDays(10),
                'user_id'      => $admin->id,
                'category_id'  => $updates?->id,
            ],
            [
                'title'        => 'This Year\'s Magical Theme Revealed',
                'slug'         => 'theme-revealed-2026',
                'excerpt'      => 'Dive into the world of Tomorrowland as we unveil the immersive theme that will bring the stages to life.',
                'body'         => "Every year, Tomorrowland transforms De Schorre into an entirely new world. This year's theme was designed by a team of 200 creative professionals over 18 months, drawing inspiration from mythology, nature, and the future.\n\nThe main stage will be a towering 50-metre structure, visible from every corner of the festival grounds. Hundreds of thousands of LED lights, 14 kilometres of pyrotechnic wire, and state-of-the-art water features will make this the most spectacular stage ever built.\n\nWe cannot wait to share this magical world with you. The countdown has begun.",
                'is_published' => true,
                'published_at' => now()->subDays(15),
                'user_id'      => $admin->id,
                'category_id'  => $behind?->id,
            ],
            [
                'title'        => 'DreamVille Camping: What to Expect in 2026',
                'slug'         => 'dreamville-camping-2026',
                'excerpt'      => 'Everything you need to know about the on-site camping experience — updated for 2026.',
                'body'         => "DreamVille is the heart of the Tomorrowland community. Thousands of festival-goers from over 200 countries make their home at DreamVille every year, creating one of the most diverse and friendly communities on earth.\n\nThis year we are expanding the Premium Comfort camping section by 30%, adding new shower facilities, and introducing a dedicated silent zone for guests who need a quieter rest after a night on the dance floor.\n\nDreamVille packages include shuttle transport, a welcome pack, and access to exclusive DreamVille-only activities throughout the weekend.",
                'is_published' => true,
                'published_at' => now()->subDays(20),
                'user_id'      => $admin->id,
                'category_id'  => $updates?->id,
            ],
            [
                'title'        => 'Meet the People of Tomorrow',
                'slug'         => 'people-of-tomorrow-fan-stories',
                'excerpt'      => 'Real stories from the Tomorrowland family — people whose lives were changed by the festival.',
                'body'         => "Tomorrowland has always been more than a music festival. For millions of people around the world, it is a life-changing experience. This year, we collected stories from members of our community who wanted to share how Tomorrowland impacted their lives.\n\nFrom lifelong friendships formed on the dance floor to marriage proposals under the fireworks display, the stories we received reminded us why we do what we do. Every single person who passes through our gates carries a unique story.\n\nWe will be sharing a new fan story every week in the run-up to the festival. Follow along and be inspired by the people of tomorrow.",
                'is_published' => true,
                'published_at' => now()->subDays(25),
                'user_id'      => $admin->id,
                'category_id'  => $community?->id,
            ],
            [
                'title'        => 'Behind the Build: Constructing the Main Stage',
                'slug'         => 'behind-the-build-main-stage',
                'excerpt'      => 'Go behind the scenes with the 1,200 workers who build the most spectacular stage in the world.',
                'body'         => "Building the Tomorrowland main stage is a year-round endeavour. The process begins on the first day after the previous edition ends, when the design team starts sketching the next year's vision.\n\nOver 1,200 workers spend seven months constructing the stage on-site. Every beam, every panel, and every lighting rig is custom-designed and assembled by hand. The stage uses over 400 tonnes of steel and more than 2 million individually addressable LED pixels.\n\nWe sat down with the head architect and the lead pyrotechnician to get their perspective on what makes this build unique. Their dedication to perfection is what makes Tomorrowland the experience it is.",
                'is_published' => true,
                'published_at' => now()->subDays(30),
                'user_id'      => $admin->id,
                'category_id'  => $behind?->id,
            ],
        ];

        foreach ($articles as $article) {
            News::create($article);
        }
    }
}
