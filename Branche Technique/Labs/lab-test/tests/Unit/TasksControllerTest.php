<?php
namespace Tests\Unit;

use App\Models\Project;
use App\Models\Task;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

class TasksControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_tasks(): void
    {
        // Create tasks for testing
        $project = Project::factory()->create();
        $tasks = Task::factory(5)->create(['projetId' => $project->id]);

        $response = $this->get(route('tasks.index'));

        $response->assertSuccessful();
        $response->assertViewIs('tasks.index');
        $response->assertViewHas('tasks');

        // Simulate an AJAX request to the index method with a search query
        $ajaxResponse = $this->json('GET', route('tasks.index'), ['searchValue' => 'Test Task']);

        $ajaxResponse->assertSuccessful();
        $ajaxResponse->assertHeader('Content-Type', 'text/html; charset=UTF-8');

        // You might want to add more specific assertions based on the actual structure of your AJAX response
        // Example: Assert that the tasks in the response match the search query
        // $ajaxResponseTasks = $ajaxResponse->original['tasks']['data'];
    }

    public function test_create_task_view(): void
    {
        // Create a project for testing
        $project = Project::factory()->create();

        $response = $this->get(route('task.create', ['project' => $project]));

        $response->assertSuccessful();
        $response->assertViewIs('tasks.create');
        $response->assertViewHas('projects', function ($viewProjects) use ($project) {
            return $viewProjects->contains($project);
        });
    }

    public function test_store_task(): void
    {
        // Create a project for testing
        $project = Project::factory()->create();

        $taskData = [
            'nom' => 'Task Name',
            'projetId' => $project->id,
            'description' => 'Task Description'
        ];

        $response = $this->post(route('tasks.store'), $taskData);

        $response->assertRedirect(route('tasks.create'));
        $this->assertDatabaseHas('tasks', $taskData);
    }

    public function test_edit_task(): void
    {
        // Create a task for testing
        $task = Task::factory()->create();

        $response = $this->get(route('tasks.edit', ['id' => $task->id]));

        $response->assertSuccessful();
        $response->assertViewIs('tasks.edit');
        $response->assertViewHas('task', $task);
    }

    public function test_update_task(): void
    {
        // Create a task for testing
        $task = Task::factory()->create();
        $newTaskData = [
            'nom' => 'Updated Task Name',
            'projetId' => $task->projetId,
            'description' => 'Updated Task Description'
        ];

        $response = $this->put(route('tasks.update', ['id' => $task->id]), $newTaskData);

        $response->assertRedirect(route('tasks.edit', ['id' => $task->id]));
        $this->assertDatabaseHas('tasks', $newTaskData);
    }

    public function test_delete_task(): void
    {
        // Create a task for testing
        $task = Task::factory()->create();
    
        $response = $this->delete(route('tasks.destroy', ['id' => $task->id]));
    
        $response->assertRedirect(route('tasks.index'));
        
        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
        ]);
    }
    
}
