<?php

namespace App\Livewire\Forms;

use App\Models\Program;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditProgramForm extends Form
{
    #[Validate]
    public $name = '';

    #[Validate]
    public $description = '';

    #[Validate]
    public $target;

    protected function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string|max:255',
            'target' => 'required|numeric',
        ];
    }

    protected function messages(): array
    {
        return [
            'name.required' => 'Nama harus diisi.',
            'description.required' => 'Deskripsi harus diisi.',
            'description.max' => 'Deskripsi maksimal 255 karakter.',
            'target.required' => 'Target harus diisi.',
        ];
    }

    public function setProgramData(Program $program = null)
    {
        if($program) {
            $this->name = $program->name;
            $this->description = $program->description;
            $this->target = $program->target;
        }
    }

    public function save($id): void
    {
        $this->validate();

        $program = Program::findOrFail($id);

        $program->update([
            'name' => $this->name,
            'description' => $this->description,
            'target' => $this->target
        ]);
    }
}
