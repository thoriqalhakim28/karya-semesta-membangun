<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class ShowUser extends Component
{
    public $user;

    public function mount($id)
    {
        $this->user = User::with(['detail', 'contact', 'address', 'family', 'programs', 'investments'])->findOrFail($id);
    }

    public function delete(User $user): void
    {
        $user->delete();

        $this->redirect(route('admin.user.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.users.show-user');
    }
}
    