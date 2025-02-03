<?php
namespace App\Livewire\Admin\Transactions;

use App\Livewire\Forms\EditInvestmentTransactionForm;
use App\Models\Transaction;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.user')]
class EditInvestmentTransaction extends Component
{
    public EditInvestmentTransactionForm $form;

    public $id;
    public $investments = [];

    public function mount($id)
    {
        $transactions = Transaction::findOrFail($id);

        $this->form->setTransactionData($transactions);

        $this->id = $transactions->id;

        $this->investments = $transactions->user->investments()->get();
    }

    public function updated($property)
    {
        if ($property === 'form.user') {
            $user = User::find($this->form->user);

            $this->form->investment = null;

            $this->investments = $user->investments()->get();
        }
    }

    public function submit()
    {
        $this->form->save($this->id);

        $this->redirect(route('admin.transaction.index', $this->id), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.transactions.edit-investment-transaction', [
            'users' => User::role('user')->get(),
        ]);
    }
}
