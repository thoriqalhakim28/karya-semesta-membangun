<?php
namespace App\Livewire\Forms;

use App\Models\Transaction;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateInvestmentTransactionForm extends Form
{
    public $data = [
        'transactions' => [
            [
                'date'       => '',
                'user'       => '',
                'investment' => '',
                'amount'     => '',
                'payment'    => '',
            ],
        ],
    ];

    protected function rules(): array
    {
        return [
            'data.transactions.*.date'       => 'required|date',
            'data.transactions.*.user'       => 'required|exists:users,id',
            'data.transactions.*.investment' => 'required|exists:investments,id',
            'data.transactions.*.amount'     => 'required|numeric',
            'data.transactions.*.payment'    => 'required|string',
        ];
    }

    protected function messages(): array
    {
        return [
            'data.transactions.*.date.required'       => 'Tanggal transaksi harus diisi.',
            'data.transactions.*.date.date'           => 'Tanggal transaksi tidak valid.',
            'data.transactions.*.user.required'       => 'Pengguna harus diisi.',
            'data.transactions.*.user.exists'         => 'Pengguna tidak ditemukan.',
            'data.transactions.*.investment.required' => 'Jenis Investasi harus diisi.',
            'data.transactions.*.investment.exists'   => 'Jenis Investasi tidak ditemukan.',
            'data.transactions.*.amount.required'     => 'Jumlah transaksi harus diisi.',
            'data.transactions.*.amount.numeric'      => 'Jumlah transaksi harus berupa angka.',
            'data.transactions.*.payment.required'    => 'Metode pembayaran harus diisi.',
        ];
    }

    public function save(): void
    {
        try {
            $this->validate();

            foreach ($this->data['transactions'] as $item) {
                Transaction::create([
                    'user_id'              => $item['user'],
                    'transactionable_id'   => $item['investment'],
                    'transactionable_type' => 'App\Models\Investment',
                    'transaction_date'     => $item['date'],
                    'amount'               => $item['amount'],
                    'payment_method'       => $item['payment'],
                ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
