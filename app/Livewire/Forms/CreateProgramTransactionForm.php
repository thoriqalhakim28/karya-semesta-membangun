<?php
namespace App\Livewire\Forms;

use App\Models\Transaction;
use Livewire\Form;

class CreateProgramTransactionForm extends Form
{
    public $data = [
        'transactions' => [
            [
                'date'    => '',
                'user'    => '',
                'program' => '',
                'type'    => '',
                'amount'  => '',
                'payment' => '',
            ],
        ],
    ];

    protected function rules(): array
    {
        return [
            'data.transactions.*.date'    => 'required|date',
            'data.transactions.*.user'    => 'required|exists:users,id',
            'data.transactions.*.program' => 'required|exists:programs,id',
            'data.transactions.*.type'    => 'required|string|in:loyalty,personal',
            'data.transactions.*.amount'  => 'required|numeric',
            'data.transactions.*.payment' => 'required|string',
        ];
    }

    protected function messages(): array
    {
        return [
            'data.transactions.*.date.required'    => 'Tanggal transaksi harus diisi.',
            'data.transactions.*.date.date'        => 'Tanggal transaksi tidak valid.',
            'data.transactions.*.user.required'    => 'Pengguna harus diisi.',
            'data.transactions.*.user.exists'      => 'Pengguna tidak ditemukan.',
            'data.transactions.*.program.required' => 'Program harus diisi.',
            'data.transactions.*.program.exists'   => 'Program tidak ditemukan.',
            'data.transactions.*.type.required'    => 'Tipe transaksi harus diisi.',
            'data.transactions.*.type.in'          => 'Tipe transaksi tidak valid.',
            'data.transactions.*.amount.required'  => 'Jumlah transaksi harus diisi.',
            'data.transactions.*.amount.numeric'   => 'Jumlah transaksi harus berupa angka.',
            'data.transactions.*.payment.required' => 'Metode pembayaran harus diisi.',
        ];
    }

    public function save(): void
    {
        try {
            $this->validate();

            foreach ($this->data['transactions'] as $item) {
                Transaction::create([
                    'user_id'              => $item['user'],
                    'transactionable_id'   => $item['program'],
                    'transactionable_type' => 'App\Models\Program',
                    'transaction_date'     => $item['date'],
                    'transaction_type'     => $item['type'],
                    'amount'               => $item['amount'],
                    'payment_method'       => $item['payment'],
                ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
