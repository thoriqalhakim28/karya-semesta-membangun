<?php

namespace App\Livewire\Admin\Users;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class IndexUser extends Component
{
    public function render()
    {
        return view('livewire.admin.users.index-user');
    }
}
