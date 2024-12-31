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
        $this->user = User::with(['detail', 'contact', 'address', 'family'])->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.admin.users.show-user');
    }
}
