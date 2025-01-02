<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditUserProfileForm extends Form
{
    #[Validate('required|string|max:255')]
    public $name;

    protected function messages(): array
    {
        return [
            'name.required' => 'Nama harus diisi.',
            'name.max' => 'Nama maksimal 255 karakter.',
        ];
    }

    public function setUserData(User $user = null): void
    {
        if ($user) {
            $this->name = $user->name;
        }
    }

    public function save($id): void
    {
        $this->validate();

        $user = User::findOrFail($id);

        $user->name = $this->name;

        $user->save();
    }
}
