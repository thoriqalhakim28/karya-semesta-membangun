<?php

namespace App\Livewire\Forms;

use App\Models\Investment;
use App\Models\Program;
use App\Models\Transaction;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateTransactionForm extends Form
{
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

    public function save($type): void
    {
        $this->validate();

        $transaction = new Transaction();

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
