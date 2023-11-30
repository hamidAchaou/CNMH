<?php

namespace Tests\Feature\Tasks;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Task;

class TasksMainTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_displays_all_Tasks()
    {
        // $tasks = Task::TaskFactory()->count(3)->create(); 

        $response = $this->get('/'); 
        $response->assertStatus(200); 

        $response->assertViewIs('tasks.index');
        $tasksPaginated = Task::paginate(3); 
        $response->assertViewHas('tasks', $tasksPaginated);

        // // You can also test for specific data in the response
        $response->assertSeeInOrder($tasksPaginated->pluck('nom')->toArray()); 
        $response->assertSeeInOrder($tasksPaginated->pluck('description')->toArray());
    }
}
