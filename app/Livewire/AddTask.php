<?php

namespace App\Livewire;

use App\Events\ActivityLogged;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddTask extends Component
{
    public $projectName;

    public $projectId;

    public $users;

    public $title;

    public $description;

    public $status = 'pending';

    public $assigned_to;

    public $due_date;

    public function submit()
    {
        $this->validate([
            'title' => 'required|string|max:100',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
            'assigned_to' => 'required|exists:users,id',
            'due_date' => 'required|date|after_or_equal:today',
        ]);

        $task = Task::create([
            'project_id' => $this->projectId,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'user_id' => $this->assigned_to,
            'due_date' => $this->due_date,
        ]);

        session()->flash('message', 'Task created successfully.');
        $this->resetExcept('users', 'projectName'); // Clear form
        event(new ActivityLogged(
            userId: Auth::user()->id,
            table_name: 'Task',
            target_id: $task->id,
            action: 'Task status has been updated to '.ucfirst($task->status).' by '.Auth::user()->name
        ));
    }

    public function mount($project)
    {
        $this->projectName = $project->name;
        $this->projectId = $project->id;

        $this->users = User::where(['user_type' => 'User'])->get();
    }

    public function render()
    {

        return view('livewire.add-task');
    }
}
