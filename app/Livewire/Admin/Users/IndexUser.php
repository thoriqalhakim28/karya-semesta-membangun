<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class IndexUser extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search = '';

    public function render()
    {
        return view('livewire.admin.users.index-user')->with([
            'users' => User::with(['contact'])->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })->paginate(10)
        ]);
    }
}
