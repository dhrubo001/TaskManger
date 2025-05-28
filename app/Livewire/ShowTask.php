<?php

namespace App\Livewire;

use App\Events\ActivityLogged;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ShowTask extends Component
{
    public $project;

    public $tasks;

    public $projectId;

    public $projectName;

    public $statusFilter = 'All';

    public $searchTerm = '';

    public function mount($projectId)
    {
        $this->projectId = $projectId;

        // Load project and set project name
        $this->project = Project::findOrFail($projectId);
        $this->projectName = $this->project->name;

        // Initially load tasks
        $this->loadTasks();
    }

    public function updatedStatusFilter($value)
    {
        // Log::info('updatedStatusFilter called with value: ' . $value);
        $this->loadTasks();
    }

    public function updatedSearchTerm()
    {
        $this->loadTasks();
    }


    public function loadTasks()
    {
        $query = Task::with('assignedTo')
            ->where('project_id', $this->projectId);

        if (! empty($this->statusFilter) && $this->statusFilter !== 'All') {
            $query->where('status', $this->statusFilter);
        }

        if (! empty($this->searchTerm)) {
            $query->where('title', 'like', '%' . $this->searchTerm . '%');
        }

        $this->tasks = $query->get();
    }

    public function toggleStatus($taskId)
    {
        $task = Task::findOrFail($taskId);

        $task->status = strtolower($task->status) === 'completed' ? 'pending' : 'completed';
        $task->save();

        $this->loadTasks();

        event(new ActivityLogged(
            userId: Auth::user()->id,
            table_name: 'Task',
            target_id: $task->id,
            action: 'Task status has been updated to ' . ucfirst($task->status) . ' by ' . Auth::user()->name
        ));
    }

    public function render()
    {
        return view('livewire.show-task');
    }
}
