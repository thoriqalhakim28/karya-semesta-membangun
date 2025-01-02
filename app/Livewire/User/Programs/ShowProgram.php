<?php

namespace App\Livewire\User\Programs;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.user')]
class ShowProgram extends Component
{
    public function render()
    {
        return view('livewire.user.programs.show-program');
    }
}
