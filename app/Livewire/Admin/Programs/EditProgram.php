<?php

namespace App\Livewire\Admin\Programs;

use App\Livewire\Forms\EditProgramForm;
use App\Models\Program;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class EditProgram extends Component
{
    public EditProgramForm $form;

    public $programId;

    public function mount($id)
    {
        $program = Program::findOrFail($id);

        $this->form->setProgramData($program);
        $this->programId = $program->id;

    }

    public function submit(): void
    {
        $this->form->save($this->programId);

        $this->redirect(route('admin.program.show', $this->programId), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.programs.edit-program');
    }
}
