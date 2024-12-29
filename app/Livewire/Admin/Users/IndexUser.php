<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class IndexUser extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.admin.users.index-user')->with([
            'users' => User::paginate(10),
        ]);
    }
}
