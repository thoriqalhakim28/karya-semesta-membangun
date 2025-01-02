<?php

namespace App\Livewire\Forms;

use App\Models\UserDetail;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditUserDetailForm extends Form
{
    #[Validate('nullable|date')]
    public $birthDate;

    #[Validate('nullable|string|max:255')]
    public $birthPlace;

    #[Validate('nullable|string|in:laki-laki,perempuan')]
    public $gender;

    #[Validate('nullable|boolean')]
    public $isMarried;

    #[Validate('nullable|string')]
    public $lastEducation;

    #[Validate('nullable|string')]
    public $major;

    #[Validate('nullable|string')]
    public $job;

    public function setDetailData(UserDetail $detail = null): void
    {
        if ($detail) {
            $this->birthDate = $detail->birth_date;
            $this->birthPlace = $detail->birth_place;
            $this->gender = $detail->gender;
            $this->isMarried = $detail->is_married;
            $this->lastEducation = $detail->last_education;
            $this->major = $detail->major;
            $this->job = $detail->job;
        }
    }

    public function save($id): void
    {
        $this->validate();

        $detail = UserDetail::where('user_id', $id)->first();

        $detail->update([
            'birth_date' => $this->birthDate,
            'birth_place' => $this->birthPlace,
            'gender' => $this->gender,
            'is_married' => $this->isMarried,
            'last_education' => $this->lastEducation,
            'major' => $this->major,
            'job' => $this->job
        ]);
    }
}
