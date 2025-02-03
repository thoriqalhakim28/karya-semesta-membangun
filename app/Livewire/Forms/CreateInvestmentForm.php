<?php

namespace App\Livewire\Forms;

use App\Models\Investment;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateInvestmentForm extends Form
{
    #[Validate]
    public $name = '';

    protected function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

    protected function messages(): array
    {
        return [
            'name.required' => 'Nama harus diisi.',
        ];
    }

    public function save(): void
    {
        $this->validate();

        Investment::create([
            'name' => $this->name,
        ]);
    }
}
