<?php

namespace App\Livewire\Forms;

use App\Models\UserFamily;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditUserFamilyForm extends Form
{
    #[Validate('nullable|string')]
    public $fatherName;

    #[Validate('nullable|string')]
    public $motherName;

    #[Validate('nullable|string|in:ayah,ibu,anak')]
    public $familyStatus;

    #[Validate('nullable|numeric')]
    public $numberOfChildren;

    #[Validate('nullable|string|in:milik,sewa')]
    public $residentialOwnership;


    public function setDetailData(UserFamily $family = null): void
    {
        if ($family) {
            $this->fatherName = $family->father_name;
            $this->motherName = $family->mother_name;
            $this->familyStatus = $family->family_status;
            $this->numberOfChildren = $family->number_of_children;
            $this->residentialOwnership = $family->residential_ownership;
        }
    }

    public function save($id): void
    {
        $this->validate();

        UserFamily::updateOrCreate([
            'user_id' => $id
        ], [
            'father_name' => $this->fatherName,
            'mother_name' => $this->motherName,
            'family_status' => $this->familyStatus,
            'number_of_children' => $this->numberOfChildren,
            'residential_ownership' => $this->residentialOwnership
        ]);
    }
}
