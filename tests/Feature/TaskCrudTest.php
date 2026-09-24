<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_task_crud_flow_is_connected_to_the_database(): void
    {
        $create = $this->post(route('tasks.store'), [
            'task_name' => 'Finish project',
            'description' => 'Connect the task manager layers',
            'status' => 'Pending',
            'due_date' => '2026-10-01',
        ]);

        $task = Task::firstOrFail();

        $create->assertRedirect(route('tasks.index'));
        $this->assertDatabaseHas('tasks', ['task_name' => 'Finish project', 'status' => 'Pending']);

        $this->patch(route('tasks.status', $task))->assertRedirect(route('tasks.index'));
        $this->assertDatabaseHas('tasks', ['id' => $task->id, 'status' => 'Completed']);

        $this->put(route('tasks.update', $task), [
            'task_name' => 'Finish Laravel project',
            'description' => 'All layers are connected',
            'status' => 'Completed',
            'due_date' => '2026-10-02',
        ])->assertRedirect(route('tasks.index'));

        $this->assertDatabaseHas('tasks', ['id' => $task->id, 'task_name' => 'Finish Laravel project']);

        $this->delete(route('tasks.destroy', $task))->assertRedirect(route('tasks.index'));
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}