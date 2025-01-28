<?php
namespace App\Livewire\Admin\Transactions;

use App\Livewire\Forms\EditProgramTransactionForm;
use App\Models\Transaction;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class EditProgramTransactions extends Component
{
    public EditProgramTransactionForm $form;

    public $id;
    public $programs = [];

    public function mount($id)
    {
        $transactions = Transaction::findOrFail($id);

        $this->form->setTransactionData($transactions);

        $this->id = $transactions->id;

        $this->programs = $transactions->user->programs()->get();
    }

    public function updated($property)
    {
        if ($property === 'form.user') {
            $user = User::find($this->form->user);

            $this->form->program = null;

            $this->programs = $user->programs()->get();
        }
    }

    public function submit()
    {
        $this->form->save($this->id);

        $this->redirect(route('admin.transaction.index', $this->id), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.transactions.edit-program-transactions', [
            'users' => User::role('user')->get(),
        ]);
    }
}
