<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class ProjectList extends Component
{
    public $projects;
    public $search = '';


    public function render()
    {
        $this->projects = Project::withCount('tasks')
            ->where('name', 'like', '%' . $this->search . '%')
            ->get();

        return view('livewire.project-list');
    }
}
