<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class AddProject extends Component
{
    public $name;

    public $description;

    protected $rules = [
        'name' => 'required|string|max:100',
        'description' => 'nullable|string|max:500',
    ];

    public function submit()
    {
        $this->validate();

        Project::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->reset(['name', 'description']);

        session()->flash('message', 'Project added successfully.');
    }

    public function render()
    {
        return view('livewire.add-project');
    }
}
