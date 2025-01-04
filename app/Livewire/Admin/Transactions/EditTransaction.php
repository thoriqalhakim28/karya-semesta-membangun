<?php

namespace App\Livewire\Admin\Transactions;

use App\Livewire\Forms\EditTransactionForm;
use App\Models\Transaction;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class EditTransaction extends Component
{
    public EditTransactionForm $form;

    public $type = 'program';

    public $users;
    public $programs = [];
    public $investments = [];


    public function mount($id)
    {
        $transaction = Transaction::findOrFail($id);
        $this->users = User::with(['investments', 'programs'])->get();

        $this->type = $transaction->transactionable_type === 'App\Models\Program' ? 'program' : 'investasi';

        if ($transaction->user_id) {
            $user = User::find($transaction->user_id);
            if ($user) {
                if ($this->type === 'program') {
                    $this->programs = $user->programs()->get();
                } elseif ($this->type === 'investasi') {
                    $this->investments = $user->investments()->get();
                }
            }
        }

        $this->form->setTransactionData($transaction);
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
            $this->form->program = null;
            $this->form->investment = null;
            $this->form->transactionType = null;
            $this->programs = [];
            $this->investments = [];

            if ($this->form->user) {
                $user = User::find($this->form->user);
                if ($user) {
                    if ($this->type === 'program') {
                        $this->programs = $user->programs()->get();
                    } elseif ($this->type === 'investasi') {
                        $this->investments = $user->investments()->get();
                    }
                }
            }
        }
    }

    public function submit(): void
    {
        $this->form->save($this->type, $this->form->id);

        $this->redirect(route('admin.transaction.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.transactions.edit-transaction');
    }
}
