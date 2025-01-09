<?php

namespace App\Livewire\Forms;

use App\Models\Investment;
use App\Models\Program;
use App\Models\Transaction;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditTransactionForm extends Form
{
    public $id;
    public $date;
    public $user;
    public $program;
    public $investment;
    public $transactionType;
    public $amount;
    public $payment;

    protected function rules(): array
    {
        return [
            'date' => 'required|date',
            'user' => 'required|exists:users,id',
            'program' => 'nullable|exists:programs,id',
            'transactionType' => 'nullable|string|in:loyalty,personal',
            'investment' => 'nullable|exists:investments,id',
            'amount' => 'required|numeric',
            'payment' => 'required|string',
        ];
    }

    protected function messages(): array
    {
        return [
            'date.required' => 'Tanggal harus diisi.',
            'date.date' => 'Format tanggal tidak valid.',
            'user.required' => 'Pengguna harus diisi.',
            'user.exists' => 'Pengguna tidak ditemukan.',
            'program.required' => 'Program harus diisi.',
            'program.exists' => 'Program tidak ditemukan.',
            'transactionType.required' => 'Tipe harus diisi.',
            'transactionType.in' => 'Tipe tidak valid.',
            'amount.required' => 'Jumlah harus diisi.',
            'amount.numeric' => 'Jumlah harus berupa angka.',
            'payment.required' => 'Metode pembayaran harus diisi.',
        ];
    }

    public function setTransactionData(Transaction $transaction = null): void
    {
        if ($transaction) {
            $this->id = $transaction->id;
            $this->date = $transaction->transaction_date;
            $this->user = $transaction->user_id;
            $this->transactionType = $transaction->transaction_type;
            $this->amount = $transaction->amount;
            $this->payment = $transaction->payment_method;
        }

        if ($transaction->transactionable_type === Program::class) {
            $this->program = $transaction->transactionable_id;
        } elseif ($transaction->transactionable_type === Investment::class) {
            $this->investment = $transaction->transactionable_id;
        }
    }

    public function save($type, $id): void
    {
        $this->validate();

        $transaction = Transaction::findOrFail($id);

        $transaction->user_id = $this->user;
        $transaction->transaction_date = $this->date;

        if ($type == 'program') {
            $transaction->transactionable_id = $this->program;
            $transaction->transactionable_type = Program::class;
            $transaction->transaction_type = $this->transactionType;
        } elseif ($type == 'investasi') {
            $transaction->transactionable_id = $this->investment;
            $transaction->transactionable_type = Investment::class;
        }

        $transaction->amount = $this->amount;
        $transaction->payment_method = $this->payment;

        $transaction->save();
    }
}
