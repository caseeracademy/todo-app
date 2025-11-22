<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_project(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/projects', [
            'name' => 'New Project',
        ]);

        $response->assertRedirect(route('todos.index'));
        $this->assertDatabaseHas('projects', [
            'name' => 'New Project',
            'user_id' => $user->id,
        ]);
    }

    public function test_user_can_view_project(): void
    {
        $user = User::factory()->create();
        $project = Project::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get(route('projects.show', $project));

        $response->assertStatus(200);
        $response->assertSee($project->name);
    }

    public function test_user_cannot_view_others_project(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $project = Project::factory()->create(['user_id' => $otherUser->id]);

        $response = $this->actingAs($user)->get(route('projects.show', $project));

        $response->assertStatus(403);
    }

    public function test_user_can_add_todo_to_project(): void
    {
        $user = User::factory()->create();
        $project = Project::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->post('/todos', [
            'title' => 'Project Task',
            'project_id' => $project->id,
        ]);

        $response->assertRedirect(route('projects.show', $project));
        $this->assertDatabaseHas('todos', [
            'title' => 'Project Task',
            'project_id' => $project->id,
            'user_id' => $user->id,
        ]);
    }
}
