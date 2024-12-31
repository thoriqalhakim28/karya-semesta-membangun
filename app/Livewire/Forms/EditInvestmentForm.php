<?php

namespace App\Livewire\Forms;

use App\Models\Investment;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditInvestmentForm extends Form
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

    public function setInvestmentData(Investment $investment = null): void
    {
        if($investment) {
            $this->name = $investment->name;
        }
    }

    public function save($id): void
    {
        $this->validate();

        $investment = Investment::findOrFail($id);

        $investment->update([
            'name' => $this->name
        ]);
    }
}
