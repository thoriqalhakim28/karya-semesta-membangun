<?php

namespace App\Livewire\User\Profile;

use App\Livewire\Forms\EditUserAddressForm;
use App\Livewire\Forms\EditUserContactForm;
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
    public EditUserContactForm $contact;
    public EditUserAddressForm $address;

    public $user;

    public function mount()
    {
        $this->user = User::with(['detail', 'contact', 'address', 'family'])->findOrFail(Auth::user()->id);

        $this->form->setUserData($this->user);
        $this->detail->setDetailData($this->user->detail);
        $this->contact->setDetailData($this->user->contact);
        $this->address->setDetailData($this->user->address);
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

    public function submitContact(): void
    {
        $this->contact->save($this->user->id);

        $this->dispatch('close-modal', 'edit-contact');
    }

    public function submitAddress(): void
    {
        $this->address->save($this->user->id);

        $this->dispatch('close-modal', 'edit-address');
    }

    public function render()
    {
        return view('livewire.user.profile.index-profile');
    }
}
