<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserQuest;
use App\Models\HappyQuest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class HappyQuestControllerTest extends TestCase
{
    public function test_complete_quest_successfully()
    {
        $user = User::factory()->create();
        $quest = HappyQuest::factory()->create(['is_active' => true]);
        Auth::login($user);
        $response = $this->postJson("/happyquest/complete/{$quest->id}");
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => 'Quest completed successfully',
        ]);

        $this->assertDatabaseHas('user_quests', [
            'user_id' => $user->id,
            'happy_quest_id' => $quest->id,
            'status' => 'completed',
        ]);
    }


    public function test_cannot_complete_quest_twice()
    {
        $user = User::factory()->create();
        $quest = HappyQuest::factory()->create(['is_active' => true]);

        Auth::login($user);
        UserQuest::create([
            'user_id' => $user->id,
            'happy_quest_id' => $quest->id,
            'status' => 'completed',
            'completed_at' => now(),
        ]);

        $response = $this->postJson("/happyquest/complete/{$quest->id}");


        $response->assertStatus(400);
        $response->assertJson([
            'success' => false,
            'message' => 'Quest already completed',
        ]);
    }

    public function test_complete_quest_handles_errors()
    {

        $user = User::factory()->create();
        $quest = HappyQuest::factory()->create(['is_active' => true]);

        Auth::login($user);


        DB::shouldReceive('beginTransaction')->andThrow(new \Exception('Test error'));

        $response = $this->postJson("/happyquest/complete/{$quest->id}");

        $response->assertStatus(500);
        $response->assertJson([
            'success' => false,
            'message' => 'Error completing quest',
        ]);


        $this->assertDatabaseMissing('user_quests', [
            'user_id' => $user->id,
            'happy_quest_id' => $quest->id,
        ]);
    }
}
