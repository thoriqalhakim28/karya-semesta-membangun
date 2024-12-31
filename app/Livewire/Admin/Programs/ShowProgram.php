<?php

namespace App\Livewire\Admin\Programs;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class ShowProgram extends Component
{
    public function render()
    {
        return view('livewire.admin.programs.show-program');
    }
}
