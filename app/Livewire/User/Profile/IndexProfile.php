<?php

namespace App\Livewire\User\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.profile')]
class IndexProfile extends Component
{
    public function render()
    {
        return view('livewire.user.profile.index-profile')->with([
            'user' => User::with(['detail', 'contact', 'address', 'family'])->findOrFail(Auth::user()->id)
        ]);
    }
}
