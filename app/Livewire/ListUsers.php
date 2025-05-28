<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class ListUsers extends Component
{
    public $users;

    public function mount()
    {
        $this->users = User::where('user_type', 'User')->get();
    }

    public function render()
    {
        return view('livewire.list-users');
    }
}
