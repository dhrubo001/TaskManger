<?php

namespace App\Livewire;

use Livewire\Component;

class EditProject extends Component
{
    public $project;

    public $name;

    public $description;

    public function mount($project)
    {
        $this->project = $project;
        $this->name = $project->name;
        $this->description = $project->description;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:500',
        ]);

        $this->project->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Project updated successfully.');
    }

    public function render()
    {
        return view('livewire.edit-project');
    }
}
