<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

  
    public function login_page_can_be_rendered()
    {
        $response = $this->get(route('login'));
        
        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

   
    public function user_can_login_successfully_with_correct_credentials()
    {
        
        $user = User::factory()->create([
            'email' => 'hakyan@example.com',
            'password' => bcrypt('password123'),
            'role' => 'user'
        ]);

        
        $response = $this->post(route('login'), [
            'email' => 'hakyan@example.com',
            'password' => 'password123'
        ]);

        $response->assertRedirect(route('user.dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    public function admin_is_redirected_to_admin_dashboard()
    {
        $user = User::factory()->create([
            'email' => 'adminhakyan@example.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin'
        ]);

        $response = $this->post(route('login'), [
            'email' => 'adminhakyan@example.com',
            'password' => 'admin123'
        ]);

        $response->assertRedirect(route('admin.happyquest'));
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function psikolog_is_redirected_to_psikolog_dashboard()
    {
        $user = User::factory()->create([
            'email' => 'psikologhakyan@example.com',
            'password' => bcrypt('psikolog123'),
            'role' => 'psikolog'
        ]);

        $response = $this->post(route('login'), [
            'email' => 'psikologhakyan@example.com',
            'password' => 'psikolog123'
        ]);

        $response->assertRedirect(route('psikolog.dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function login_fails_with_incorrect_credentials()
    {
        User::factory()->create([
            'email' => 'userhakyan@example.com',
            'password' => bcrypt('correct_password')
        ]);

        $response = $this->post(route('login'), [
            'email' => 'userhakyan@example.com',
            'password' => 'wrong_password'
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    /** @test */
    public function login_fails_with_invalid_email_format()
    {
        $response = $this->post(route('login'), [
            'email' => 'invalid-email',
            'password' => 'somepassword'
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    /** @test */
    public function login_requires_email_and_password()
    {
        $response = $this->post(route('login'), [
            'password' => 'somepassword'
        ]);

        $response->assertSessionHasErrors('email');

        $response = $this->post(route('login'), [
            'email' => 'userhakyan@example.com'
        ]);

        $response->assertSessionHasErrors('password');
        $this->assertGuest();
    }
}