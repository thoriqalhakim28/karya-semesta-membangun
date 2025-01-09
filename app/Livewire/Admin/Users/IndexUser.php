<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
class IndexUser extends Component
{
    use WithPagination;

    #[Url(as: 'q')]
    public $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function getUsersProperty()
    {
        return User::role('user')->with('contact')->where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%');
        })->paginate(10);
    }

    public function render()
    {
        return view('livewire.admin.users.index-user')->with([
            'users' => $this->users
        ]);
    }
}
