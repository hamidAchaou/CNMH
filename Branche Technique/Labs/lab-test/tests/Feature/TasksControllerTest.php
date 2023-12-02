<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Support\Carbon;

class TasksControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    // public function test_displays_tasks()
    // {
    //     $data = [
    //         [
    //             'nom' => 'choisir le thème',
    //             'description' => 'choisir le thème pour créer un portfolio',
    //             'projetId' => '1',
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ],
    //         [
    //             'nom' => 'Choix des Technologies',
    //             'description' => 'Évaluation et sélection des technologies les plus adaptées pour développer l\'application Arbre des Compétences.',
    //             'projetId' => '2',
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ],
    //     ];

    //     foreach ($data as $taskData) {
    //         Task::create($taskData);
    //     }

    //     $response = $this->get('/');

    //     // Add your assertions here to check the content displayed in the view
    //     // For example:
    //     // $response->assertStatus(200)
    //     //     ->assertViewIs('tasks.index')
    //     //     ->assertSee('Your HTML content to check in the tasks index view');
    // }




/** @test */
public function test_shows_create_task_form()
{
    $projectData = [
        'nom' => 'Portfolio',
        'description' => 'Développement d\'un site web mettant en valeur nos compétences.',
    ];

    $project = Project::create($projectData);

    $response = $this->get('/create');

    // $response->assertStatus(200)
    //     ->assertViewIs('tasks.create')
    //     ->assertSee('Your HTML content to check in the tasks create form'); // Add appropriate HTML content checks

    // Optionally, you can also assert that the view contains the project information
    // $response->assertViewHas('projects', Project::all()); // If you expect all projects to be passed to the view
    // Or
    // $response->assertViewHas('projects', function ($viewProjects) use ($project) {
    //     return $viewProjects->contains($project);
    // });
}


    /** @test */
    // public function test_shows_edit_task_form()
    // {
    //     $task = Task::factory()->create();
    //     $projects = Project::factory()->count(3)->create();

    //     $response = $this->get("/tasks/{$task->id}/edit");

    //     $response->assertStatus(200)
    //         ->assertViewIs('tasks.edit')
    //         ->assertViewHas('task', $task)
    //         ->assertViewHas('projects', $projects);
    //         // Assert other view content or data passed to the view as needed
    // }

    /** @test */
    // public function test_deletes_task()
    // {
    //     $task = Task::factory()->create();

    //     $response = $this->delete("/tasks/{$task->id}");

    //     $response->assertRedirect(route('tasks.index'))
    //         ->assertSessionHas('success', 'Tâche supprimée avec succès !');

    //     $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    // }

    /** @test */
    // public function test_can_create_task()
    // {
    //     $project = Project::factory()->create();

    //     $response = $this->post('/tasks', [
    //         'nom' => 'Task Name',
    //         'projetId' => $project->id,
    //         'description' => 'Task Description'
    //     ]);

    //     $response->assertRedirect(route('tasks.create'))
    //         ->assertSessionHas('success', 'tache a été ajouter avec succés');

    //     $this->assertDatabaseHas('tasks', [
    //         'nom' => 'Task Name',
    //         'projetId' => $project->id,
    //         'description' => 'Task Description'
    //     ]);
    // }

    /** @test */
    // public function test_can_update_task()
    // {
    //     $task = Task::factory()->create();
    //     $project = Project::factory()->create();

    //     $response = $this->put("/tasks/{$task->id}", [
    //         'nom' => 'Updated Task Name',
    //         'projetId' => $project->id,
    //         'description' => 'Updated Task Description'
    //     ]);

    //     $response->assertRedirect(route('tasks.edit', ['id' => $task->id]))
    //         ->assertSessionHas('success', 'tache a été modifier avec succés');

    //     $this->assertDatabaseHas('tasks', [
    //         'id' => $task->id,
    //         'nom' => 'Updated Task Name',
    //         'projetId' => $project->id,
    //         'description' => 'Updated Task Description'
    //     ]);
    // }
}
