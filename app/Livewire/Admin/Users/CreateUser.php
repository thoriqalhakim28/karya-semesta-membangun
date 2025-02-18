<?php
namespace App\Livewire\Admin\Users;

use App\Livewire\Forms\CreateUserForm;
use App\Models\Investment;
use App\Models\Program;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class CreateUser extends Component
{
    public CreateUserForm $form;
    public $currentStep;
    public $totalSteps  = 4;
    public $programs    = [];
    public $investments = [];

    public function mount()
    {
        $this->currentStep = 1;
        $this->programs    = Program::all();
        $this->investments = Investment::all();
    }

    public function addInvestmentRow()
    {
        $this->form->dataInvestments[] = ["investment" => null];
    }

    public function removeInvestmentRow($index)
    {
        if (count($this->form->dataInvestments) > 1) {
            unset($this->form->dataInvestments[$index]);
            $this->form->dataInvestments = array_values($this->form->dataInvestments);
        }
    }

    public function addProgramRow()
    {
        $this->form->dataPrograms[] = ["program" => null];
    }

    public function removeProgramRow($index)
    {
        if (count($this->form->dataPrograms) > 1) {
            unset($this->form->dataPrograms[$index]);
            $this->form->dataPrograms = array_values($this->form->dataPrograms);
        }
    }

    public function nextStep(): void
    {
        $this->form->validateStep($this->currentStep);

        if ($this->currentStep < 4) {
            $this->currentStep++;
        }
    }

    public function previousStep(): void
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function step($num): void
    {
        if ($num <= 4 && $num > 0) {
            $this->currentStep = $num;
        }
    }

    public function getInvestmentSelectedProperty()
    {
        $investmentIds = array_column($this->form->dataInvestments, 'investment');

        return Investment::whereIn('id', $investmentIds)->get();
    }

    public function getProgramSelectedProperty()
    {
        $programIds = array_column($this->form->dataPrograms, 'program');

        return Program::whereIn('id', $programIds)->get();
    }

    public function submit()
    {
        $this->form->save();
        $this->redirect(route('admin.user.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.users.create-user', [
            'investmentSelected' => $this->investmentSelected,
            'programSelected'    => $this->programSelected,
        ]);
    }
}
