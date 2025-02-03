<?php
namespace App\Livewire\Forms;

use App\Models\Program;
use App\Models\Transaction;
use Livewire\Form;

class EditProgramTransactionForm extends Form
{
    public $date    = '';
    public $user    = '';
    public $program = '';
    public $type    = '';
    public $amount  = '';
    public $payment = '';

    protected function rules(): array
    {
        return [
            'date'    => 'required|date',
            'user'    => 'required|exists:users,id',
            'program' => 'nullable|exists:programs,id',
            'type'    => 'nullable|string|in:loyalty,personal',
            'amount'  => 'required|numeric',
            'payment' => 'required|string',
        ];
    }

    protected function messages(): array
    {
        return [
            'date.required'    => 'Tanggal harus diisi.',
            'date.date'        => 'Format tanggal tidak valid.',
            'user.required'    => 'Pengguna harus diisi.',
            'user.exists'      => 'Pengguna tidak ditemukan.',
            'program.required' => 'Program harus diisi.',
            'program.exists'   => 'Program tidak ditemukan.',
            'type.required'    => 'Tipe harus diisi.',
            'type.in'          => 'Tipe tidak valid.',
            'amount.required'  => 'Jumlah harus diisi.',
            'amount.numeric'   => 'Jumlah harus berupa angka.',
            'payment.required' => 'Metode pembayaran harus diisi.',
        ];
    }

    public function setTransactionData(Transaction $transaction = null): void
    {
        if ($transaction) {
            $this->date    = $transaction->transaction_date;
            $this->user    = $transaction->user_id;
            $this->program = $transaction->transactionable_id;
            $this->type    = $transaction->transaction_type;
            $this->amount  = $transaction->amount;
            $this->payment = $transaction->payment_method;
        }
    }

    public function save($id): void
    {
        $this->validate();

        $transaction = Transaction::findOrFail($id);

        $transaction->user_id              = $this->user;
        $transaction->transaction_date     = $this->date;
        $transaction->transactionable_id   = $this->program;
        $transaction->transactionable_type = Program::class;
        $transaction->transaction_type     = $this->type;
        $transaction->amount               = $this->amount;
        $transaction->payment_method       = $this->payment;

        $transaction->save();
    }
}
