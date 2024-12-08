<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\HappyQuest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdminHappyQuestTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();

       
        $this->admin = User::factory()->create([
            'role' => 'admin'
        ]);
    }

    /** @test */
    public function an_admin_can_store_a_new_quest()
    {
        
         $this->actingAs($this->admin);

       
         $existingQuest = HappyQuest::factory()->create([
             'title' => 'Original Quest',
             'description' => 'Original description'
         ]);
 
        
         $updatedQuestData = [
             'title' => 'Updated Quest',
             'description' => 'Updated description'
         ];
 
      
         $response = $this->put(route('admin.quests.update', $existingQuest), $updatedQuestData);
 
        
         $existingQuest->refresh();
 
       
         $this->assertEquals('Updated Quest', $existingQuest->title);
         $this->assertEquals('Updated description', $existingQuest->description);
 
         
         $response->assertRedirect(route('admin.happyquest'))
                  ->assertSessionHas('success', 'Quest updated successfully');
    }

    public function test_admin_can_update_happyquest()
    {
        $this->actingAs($this->admin);

       
        $quest = HappyQuest::create([
            'title' => 'Old Title',
            'description' => 'Old description',
            'is_active' => false
        ]);

        
        $this->assertEquals(false, $quest->is_active, 'Initial quest should have is_active as false');


        $updatedData = [
            'title' => 'Updated Title',
            'description' => 'Updated description',
            'is_active' => true
        ];

       
        $response = $this->put(route('admin.quests.update', $quest), $updatedData);

        
        $updatedQuest = $quest->fresh();

       
        $this->assertEquals('Updated Title', $updatedQuest->title, 'Title was not updated');
        $this->assertEquals('Updated description', $updatedQuest->description, 'Description was not updated');
        
      
        $this->assertEquals(true, $updatedQuest->is_active, 'is_active should be true');

       
        $response->assertRedirect(route('admin.happyquest'))
                 ->assertSessionHas('success', 'Quest updated successfully');
    }

    public function test_admin_can_delete_happyquest()
    {
        $this->actingAs($this->admin);

        $quest = HappyQuest::factory()->create();

  
        $response = $this->delete(route('admin.quests.destroy', $quest));

   
        $this->assertDatabaseMissing('happy_quests', [
            'id' => $quest->id
        ]);

      
        $response->assertRedirect(route('admin.happyquest'))
                 ->assertSessionHas('success', 'Quest deleted successfully');
    }
    
}
