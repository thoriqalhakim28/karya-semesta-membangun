<?php

namespace App\Livewire\User\Programs;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.user')]
class IndexProgram extends Component
{
    public function render()
    {
        return view('livewire.user.programs.index-program');
    }
}
