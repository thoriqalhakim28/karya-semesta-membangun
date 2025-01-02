<?php

namespace App\Livewire\Forms;

use App\Models\UserAddress;
use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditUserAddressForm extends Form
{
    #[Validate('nullable|string|in:asal,ktp,domisili')]
    public $type;

    #[Validate('nullable|string')]
    public $alamat;


    public function setDetailData(UserAddress $address = null): void
    {
        if ($address) {
            $this->type = $address->type;
            $this->alamat = $address->address;
        }
    }

    public function save($id): void
    {
        $this->validate();

        $address = UserAddress::updateOrCreate([
            'user_id' => $id
        ], [
            'type' => $this->type,
            'address' => $this->alamat
        ]);
    }
}
