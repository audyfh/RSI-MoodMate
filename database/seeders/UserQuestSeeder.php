<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserQuest;
use App\Models\HappyQuest;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserQuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $quests = HappyQuest::all();

        
        foreach ($users as $user) {
            $randomQuests = $quests->random(rand(3, 5));

            foreach ($randomQuests as $quest) {
                UserQuest::create([
                    'user_id' => $user->id,
                    'happy_quest_id' => $quest->id,
                    'status' => rand(0, 1) ? 'completed' : 'not started',
                    'completed_at' => rand(0, 1) ? now() : null,
                ]);
            }
        }
    }
}
