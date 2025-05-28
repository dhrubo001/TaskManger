<?php

namespace App\Livewire;

use App\Models\ActivityLog;
use App\Models\Task;
use Livewire\Component;

class ActivityLogs extends Component
{
    public $taskId;

    public $logs;

    public $task;

    public function mount($taskId)
    {
        $this->task = Task::find($taskId);
        $this->taskId = $this->task->id;
    }

    public function render()
    {
        $this->logs = ActivityLog::where(['table_name' => 'Task', 'target_id' => $this->taskId])->get();

        return view('livewire.activity-logs');
    }
}
