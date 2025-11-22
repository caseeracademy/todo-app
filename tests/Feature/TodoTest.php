<?php

namespace Tests\Feature;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TodoTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_is_accessible(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_dashboard_redirects_to_todos(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertRedirect(route('todos.index'));
    }

    public function test_user_can_view_todos(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/todos');
        $response->assertStatus(200);
    }

    public function test_user_can_create_todo(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/todos', [
            'title' => 'Test Task',
        ]);

        $response->assertRedirect(route('todos.index'));
        $this->assertDatabaseHas('todos', [
            'title' => 'Test Task',
            'user_id' => $user->id,
        ]);
    }

    public function test_user_can_update_todo_status(): void
    {
        $user = User::factory()->create();
        $todo = Todo::create([
            'user_id' => $user->id,
            'title' => 'Test Task',
            'is_completed' => false,
        ]);

        $response = $this->actingAs($user)->put(route('todos.update', $todo));

        $response->assertRedirect();
        $this->assertDatabaseHas('todos', [
            'id' => $todo->id,
            'is_completed' => true,
        ]);
    }

    public function test_user_can_delete_todo(): void
    {
        $user = User::factory()->create();
        $todo = Todo::create([
            'user_id' => $user->id,
            'title' => 'Test Task',
        ]);

        $response = $this->actingAs($user)->delete(route('todos.destroy', $todo));

        $response->assertRedirect();
        $this->assertDatabaseMissing('todos', [
            'id' => $todo->id,
        ]);
    }

    public function test_user_cannot_access_others_todos(): void
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();
        $todo = Todo::create([
            'user_id' => $user1->id,
            'title' => 'User 1 Task',
        ]);

        $response = $this->actingAs($user2)->put(route('todos.update', $todo));
        $response->assertStatus(403);

        $response = $this->actingAs($user2)->delete(route('todos.destroy', $todo));
        $response->assertStatus(403);
    }
}
