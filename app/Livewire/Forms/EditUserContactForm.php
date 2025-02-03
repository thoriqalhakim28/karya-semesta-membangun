<?php

namespace App\Livewire\Forms;

use App\Models\UserContact;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditUserContactForm extends Form
{
    #[Validate('nullable|numeric')]
    public $phoneNumber;

    #[Validate('nullable|numeric')]
    public $mandiriAccountNumber;

    #[Validate('nullable|numeric')]
    public $btnAccountNumber;

    public function setDetailData(UserContact $contact = null): void
    {
        if ($contact) {
            $this->phoneNumber = $contact->phone_number;
            $this->mandiriAccountNumber = $contact->mandiri_account_number;
            $this->btnAccountNumber = $contact->btn_account_number;
        }
    }

    public function save($id): void
    {
        $this->validate();

        $contact = UserContact::where('user_id', $id)->first();

        $contact->update([
            'phone_number' => $this->phoneNumber,
            'mandiri_account_number' => $this->mandiriAccountNumber,
            'btn_account_number' => $this->btnAccountNumber
        ]);
    }
}
