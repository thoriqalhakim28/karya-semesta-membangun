<?php

namespace App\Livewire\User\Profile;

use App\Livewire\Forms\ChangeEmailForm;
use App\Livewire\Forms\ChangePasswordForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.profile')]
class AccountSetting extends Component
{
    public ChangeEmailForm $form;
    public ChangePasswordForm $passwordForm;

    public bool $hasChanges = false;

    public function mount()
    {
        $user = Auth::user();

        $this->form->setEmailData($user);
    }

    public function updated($property)
    {
        if ($property === 'form.email') {
            $this->hasChanges = $this->form->email !== $this->form->originalEmail;
        }
    }

    public function updateEmail(): void
    {
        $this->form->save(Auth::user()->id);

        $this->form->originalEmail = $this->form->email;
        $this->hasChanges = false;
        $this->form->password = '';

        $this->dispatch('close-modal', 'update-email');
        session()->flash('messageEmail', 'Email berhasil diubah');
    }

    public function updatePassword(): void
    {
        $this->passwordForm->save(Auth::user()->id);

        $this->reset('passwordForm');

        $this->dispatch('close-modal', 'update-password');
        session()->flash('messagePassword', 'Password berhasil diubah');
    }

    public function render()
    {
        return view('livewire.user.profile.account-setting');
    }
}
