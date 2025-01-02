<?php

namespace App\Livewire\User\Profile;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.profile')]
class IndexProfile extends Component
{
    public function render()
    {
        return view('livewire.user.profile.index-profile');
    }
}
