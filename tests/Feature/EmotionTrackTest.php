<?php

namespace Tests\Feature;

use App\Models\EmotionTrack;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmotionTrackTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create([
            'role' => 'user' 
        ]);
    }

    /** @test */
    public function it_can_store_a_new_emotion_track()
    {
        $this->actingAs($this->user);

        $data = [
            'title' => 'Test Emotion Track',
            'content' => 'This is a test emotion track entry',
            'emotion' => 'happy'
        ];

        $response = $this->postJson(route('emotion_track.store'), $data);

        $response->assertStatus(200)
                 ->assertJson(['success' => 'Emotion Track berhasil disimpan']);

        $this->assertDatabaseHas('emotion_tracks', [
            'title' => 'Test Emotion Track',
            'content' => 'This is a test emotion track entry',
            'emotion' => 'happy',
            'user_id' => $this->user->id
        ]);
    }

    // /** @test */
    // public function it_cannot_store_emotion_track_with_invalid_data()
    // {
    //     $this->actingAs($this->user);

    //     $invalidData = [
    //         'title' => '', 
    //         'content' => 'Some content',
    //         'emotion' => 'invalid_emotion' 
    //     ];

    //     $response = $this->postJson(route('emotion_track.store'), $invalidData);

    //     $response->assertStatus(422)
    //              ->assertJsonValidationErrors(['title', 'emotion']);
    // }

    /** @test */
    public function it_can_update_an_existing_emotion_track()
    {
        $this->actingAs($this->user);

        $emotionTrack = EmotionTrack::factory()->create([
            'user_id' => $this->user->id,
            'title' => 'Original Title',
            'content' => 'Original Content',
            'emotion' => 'neutral'
        ]);

        $updatedData = [
            'title' => 'Updated Emotion Track',
            'content' => 'This is an updated emotion track entry',
            'emotion' => 'sad'
        ];

        $response = $this->put(route('emotion_track.update', $emotionTrack->id), $updatedData);

        $response->assertRedirect(route('emotion_track.index'))
                 ->assertSessionHas('success', 'Emotion Track berhasil diperbarui');

        $this->assertDatabaseHas('emotion_tracks', [
            'id' => $emotionTrack->id,
            'title' => 'Updated Emotion Track',
            'content' => 'This is an updated emotion track entry',
            'emotion' => 'sad',
            'user_id' => $this->user->id
        ]);
    }

    // /** @test */
    // public function it_cannot_update_another_users_emotion_track()
    // {
    //     $anotherUser = User::factory()->create();

    //     $this->actingAs($this->user);

    //     $emotionTrack = EmotionTrack::factory()->create([
    //         'user_id' => $anotherUser->id
    //     ]);

    //     $updatedData = [
    //         'title' => 'Attempted Update',
    //         'content' => 'Trying to update another user\'s track',
    //         'emotion' => 'happy'
    //     ];

    
    //     $response = $this->put(route('emotion_track.update', $emotionTrack->id), $updatedData);

       
    //     $response->assertStatus(404);
    // }

    /** @test */
    public function it_can_delete_an_existing_emotion_track()
    {
     
        $this->actingAs($this->user);

      
        $emotionTrack = EmotionTrack::factory()->create([
            'user_id' => $this->user->id
        ]);

       
        $response = $this->delete(route('emotion_track.destroy', $emotionTrack->id));

   
        $response->assertRedirect(route('emotion_track.index'))
                 ->assertSessionHas('success', 'Emotion Track berhasil dihapus');

      
        $this->assertDatabaseMissing('emotion_tracks', [
            'id' => $emotionTrack->id
        ]);
    }

    // /** @test */
    // public function it_cannot_delete_another_users_emotion_track()
    // {
    //     $anotherUser = User::factory()->create();

    //     $this->actingAs($this->user);

    //     $emotionTrack = EmotionTrack::factory()->create([
    //         'user_id' => $anotherUser->id
    //     ]);

    //     $response = $this->delete(route('emotion_track.destroy', $emotionTrack->id));

    //     $response->assertStatus(404);
    // }
}