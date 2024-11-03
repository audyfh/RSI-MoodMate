<?php

namespace Database\Seeders;
use App\Models\HappyQuest;
use Illuminate\Database\Seeder;

class QuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $happy_quests = [
            [
                'title' => 'Catch a Butterfly',
                'description' => 'Find and catch a beautiful butterfly in the garden',
                'is_active' => true,
            ],
            [
                'title' => 'Plant a Tree',
                'description' => 'Plant a new tree in your neighborhood',
                'is_active' => true,
            ],
            [
                'title' => 'Clean the Beach',
                'description' => 'Help clean the local beach from trash',
                'is_active' => true,
            ],
            [
                'title' => 'Feed Street Animals',
                'description' => 'Give food to street cats or dogs',
                'is_active' => true,
            ],
            [
                'title' => 'Help an Elderly',
                'description' => 'Assist an elderly person with their daily tasks',
                'is_active' => true,
            ],
            [
                'title' => 'Donate Books',
                'description' => 'Donate your old books to a local library',
                'is_active' => true,
            ],
            [
                'title' => 'Reduce Plastic Usage',
                'description' => 'Use reusable bags instead of plastic bags for a week',
                'is_active' => true,
            ],
            [
                'title' => 'Share Knowledge',
                'description' => 'Teach someone a new skill or share knowledge',
                'is_active' => true,
            ]
        ];

        foreach ($happy_quests as $quest) {
            HappyQuest::create($quest);
        }
    }
}
