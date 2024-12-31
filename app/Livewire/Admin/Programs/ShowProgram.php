<?php

namespace App\Livewire\Admin\Programs;

use App\Models\Program;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class ShowProgram extends Component
{
    public $program;

    public function mount($id)
    {
        $this->program = Program::findOrFail($id);
    }
    public function render()
    {
        return view('livewire.admin.programs.show-program');
    }
}
