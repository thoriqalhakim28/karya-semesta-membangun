<?php

namespace App\Livewire\Admin\Transactions;

use App\Livewire\Forms\CreateTransactionForm;
use App\Models\Program;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class CreateTransaction extends Component
{
    public CreateTransactionForm $form;

    public $type = 'program';

    public $users;
    public $programs = [];
    public $investments = [];

    public function mount()
    {
        $this->users = User::all();
    }

    public function updated($property)
    {
        if ($property === 'form.user') {
            $user = User::find($this->form->user);

            if ($user) {
                if ($this->type === 'program') {
                    $this->programs = $user->programs()->get();
                } elseif ($this->type === 'investasi') {
                    $this->investments = $user->investments()->get();
                }
            }
        }

        if ($property === 'type') {
            $this->form->reset();
        }
    }

    public function submit(): void
    {
        $this->form->save($this->type);

        $this->redirect(route('admin.transaction.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.transactions.create-transaction');
    }
}
