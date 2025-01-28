<?php
namespace App\Livewire\Forms;

use App\Models\Investment;
use App\Models\Transaction;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditInvestmentTransactionForm extends Form
{
    public $date       = '';
    public $user       = '';
    public $investment = '';
    public $amount     = '';
    public $payment    = '';

    protected function rules(): array
    {
        return [
            'date'       => 'required|date',
            'user'       => 'required|exists:users,id',
            'investment' => 'nullable|exists:investments,id',
            'amount'     => 'required|numeric',
            'payment'    => 'required|string',
        ];
    }

    protected function messages(): array
    {
        return [
            'date.required'       => 'Tanggal harus diisi.',
            'date.date'           => 'Format tanggal tidak valid.',
            'user.required'       => 'Pengguna harus diisi.',
            'user.exists'         => 'Pengguna tidak ditemukan.',
            'investment.required' => 'Investment harus diisi.',
            'investment.exists'   => 'Investment tidak ditemukan.',
            'amount.required'     => 'Jumlah harus diisi.',
            'amount.numeric'      => 'Jumlah harus berupa angka.',
            'payment.required'    => 'Metode pembayaran harus diisi.',
        ];
    }

    public function setTransactionData(Transaction $transaction = null): void
    {
        if ($transaction) {
            $this->date       = $transaction->transaction_date;
            $this->user       = $transaction->user_id;
            $this->investment = $transaction->transactionable_id;
            $this->amount     = $transaction->amount;
            $this->payment    = $transaction->payment_method;
        }
    }

    public function save($id): void
    {
        $this->validate();

        $transaction = Transaction::findOrFail($id);

        $transaction->user_id              = $this->user;
        $transaction->transaction_date     = $this->date;
        $transaction->transactionable_id   = $this->investment;
        $transaction->transactionable_type = Investment::class;
        $transaction->amount               = $this->amount;
        $transaction->payment_method       = $this->payment;

        $transaction->save();
    }
}
