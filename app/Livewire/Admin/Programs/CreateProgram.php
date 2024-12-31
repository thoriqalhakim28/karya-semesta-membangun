<?php

namespace App\Livewire\Admin\Programs;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class CreateProgram extends Component
{
    public function render()
    {
        return view('livewire.admin.programs.create-program');
    }
}
