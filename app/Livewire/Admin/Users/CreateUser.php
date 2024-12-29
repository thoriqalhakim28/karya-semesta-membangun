<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Forms\CreateUserForm;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class CreateUser extends Component
{
    public CreateUserForm $form;

    public function submit(): void
    {
        $this->form->save();

        $this->redirect(route('admin.user.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.users.create-user');
    }
}
