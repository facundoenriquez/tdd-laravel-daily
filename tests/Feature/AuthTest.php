<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use refreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_unauthenticated_user_cannot_access_product(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_login_redirects_to_products(): void
    {
        $user = User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('admin123')
        ]);

        $response = $this->post('/login',[
            'email' => $user->email,
            'password' => 'admin123'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/products');
    }
}
