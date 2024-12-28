<?php

namespace App\Livewire\User;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.user')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.user.dashboard');
    }
}
