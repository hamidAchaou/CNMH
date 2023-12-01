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

    /**
     * A basic unit test example.
     */
    // public function test_example(): void
    // {
    //     $this->assertTrue(true);
    // }



    public function test_index_tasks(): void
    {
        // Create tasks for testing
        $project = Project::factory()->create();
        // dd($project->id);
        $tasks = Task::factory(5)->create(['projetId' => $project->id]);

        $response = $this->get(route('tasks.index'));

        $response->assertSuccessful();

        $response->assertViewIs('tasks.index');

        $response->assertViewHas('tasks');

        // Simulate an AJAX request to the index method with a search query
        $ajaxResponse = $this->json('GET', route('tasks.index'), ['searchValue' => 'Test Task']);

        // Assert that the AJAX response is successful
        $ajaxResponse->assertSuccessful();

        // Assert that the AJAX response is HTML
        $ajaxResponse->assertHeader('Content-Type', 'text/html; charset=UTF-8');

        // You might want to add more specific assertions based on the actual structure of your AJAX response

        // Example: Assert that the tasks in the response match the search query
        $ajaxResponseTasks = $ajaxResponse->original['tasks']['data'];
    }

        public function test_create_task_view(): void
        {
            // Create a project for testing
            $project = Project::factory()->create();
    
            // Simulate a request to the create method
            $response = $this->get(route('task.create', ['project' => $project]));
    
            // Assert that the response is successful
            $response->assertSuccessful();
    
            // Assert that the response view is 'task.create'
            $response->assertViewIs('task.create');
    
            // Assert that the view has the project variable
            $response->assertViewHas('project', $project);
        }
    }
