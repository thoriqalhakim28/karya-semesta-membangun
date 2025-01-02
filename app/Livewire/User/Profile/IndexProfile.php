<?php

namespace App\Livewire\User\Profile;

use App\Livewire\Forms\EditUserDetailForm;
use App\Livewire\Forms\EditUserProfileForm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.profile')]
class IndexProfile extends Component
{
    public EditUserProfileForm $form;
    public EditUserDetailForm $detail;

    public $user;

    public function mount()
    {
        $this->user = User::with(['detail', 'contact', 'address', 'family'])->findOrFail(Auth::user()->id);

        $this->form->setUserData($this->user);
        $this->detail->setDetailData($this->user->detail);
    }

    public function submitUser(): void
    {
        $this->form->save($this->user->id);

        $this->dispatch('close-modal', 'edit-profile');
    }

    public function submitDetail(): void
    {
        $this->detail->save($this->user->id);

        $this->dispatch('close-modal', 'edit-detail');
    }

    public function render()
    {
        return view('livewire.user.profile.index-profile');
    }
}
