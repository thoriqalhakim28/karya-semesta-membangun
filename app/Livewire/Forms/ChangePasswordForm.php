<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ChangePasswordForm extends Form
{
    public $currentPassword;
    public $newPassword;
    public $newPasswordConfirmation;

    public function rules(): array
    {
        return [
            'currentPassword' => 'required|current_password',
            'newPassword' => 'required|min:8|same:newPasswordConfirmation',
            'newPasswordConfirmation' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'currentPassword.required' => 'Password lama harus diisi',
            'currentPassword.current_password' => 'Password lama tidak sesuai',
            'newPassword.required' => 'Password baru harus diisi',
            'newPassword.min' => 'Password baru minimal 8 karakter',
            'newPassword.same' => 'Password baru tidak sama',
            'newPasswordConfirmation.required' => 'Konfirmasi password baru harus diisi'
        ];
    }

    public function save($id): void
    {
        $this->validate();

        $user = User::findOrFail($id);

        $user->update([
            'password' => Hash::make($this->newPassword)
        ]);
    }
}
