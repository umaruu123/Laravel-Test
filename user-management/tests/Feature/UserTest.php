<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** 測試創建用戶 */
    public function test_can_create_user()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone_number' => '123456789',
            'password' => 'password',
            'status' => 'active'
        ];

        $response = $this->postJson('/api/users', $data);

        $response->assertStatus(201)
            ->assertJson(['name' => 'John Doe']);
    }

    /** 測試獲取用戶列表 */
    public function test_can_list_users()
    {
        User::factory()->count(5)->create();

        $response = $this->getJson('/api/users');

        $response->assertStatus(200)
            ->assertJsonStructure(['data', 'links', 'meta']);
    }

    /** 測試更新用戶 */
    public function test_can_update_user()
    {
        $user = User::factory()->create();

        $response = $this->putJson("/api/users/{$user->id}", ['name' => 'Updated Name']);

        $response->assertStatus(200)
            ->assertJson(['name' => 'Updated Name']);
    }

    /** 測試刪除用戶 */
    public function test_can_delete_user()
    {
        $user = User::factory()->create();

        $response = $this->deleteJson("/api/users/{$user->id}");

        $response->assertStatus(200)
            ->assertJson(['message' => 'User deleted successfully']);
    }
}
