<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ChangeEmailForm extends Form
{
    public $email;

    public $originalEmail;

    public $password;

    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'password' => 'required|current_password'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password harus diisi.',
            'password.current_password' => 'Password salah.',
        ];
    }

    public function setEmailData(User $user = null): void
    {
        if ($user) {
            $this->email = $user->email;
            $this->originalEmail = $user->email;
        }
    }

    public function save($id): void
    {
        $this->validate();

        $user = User::findOrFail($id);

        $user->email = $this->email;

        $user->save();
    }
}
