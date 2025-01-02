<?php

namespace App\Livewire\User\Profile;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.profile')]
class AccountSetting extends Component
{
    public function render()
    {
        return view('livewire.user.profile.account-setting');
    }
}
