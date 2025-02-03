<?php

namespace App\Livewire\Admin\Programs;

use App\Livewire\Forms\CreateProgramForm;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class CreateProgram extends Component
{
    public CreateProgramForm $form;

    public function submit(): void
    {
        $this->form->save();

        $this->redirect(route('admin.program.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.programs.create-program');
    }
}
