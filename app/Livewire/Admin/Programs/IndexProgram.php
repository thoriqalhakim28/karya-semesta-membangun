<?php

namespace App\Livewire\Admin\Programs;

use App\Models\Program;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class IndexProgram extends Component
{
    public function render()
    {
        return view('livewire.admin.programs.index-program')->with([
            'programs' => Program::all()
        ]);
    }
}
