<?php

namespace App\Livewire\User;

use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.user')]
class Dashboard extends Component
{
    public $period = 'month';
    public $user;

    public function mount()
    {
        $this->user = User::with(['programs', 'investments', 'transactions'])->findOrFail(Auth::user()->id);
    }

    #[Computed()]
    public function totalPrograms()
    {
        return $this->user->programs->count();
    }

    #[Computed()]
    public function totalInvestments()
    {
        return $this->user->transactions->where('transactionable_type', 'App\Models\Investment')->sum('amount');
    }

    #[Computed()]
    public function totalTransactions()
    {
        $date = Carbon::now();

        switch ($this->period) {
            case 'year':
                return Transaction::whereYear('transaction_date', date('Y'))
                    ->where('user_id', $this->user->id)
                    ->orderBy('transaction_date', 'desc')
                    ->count();
                break;
            case 'month':
                return Transaction::whereMonth('transaction_date', date('m'))
                    ->where('user_id', $this->user->id)
                    ->whereYear('transaction_date', date('Y'))
                    ->orderBy('transaction_date', 'desc')
                    ->count();
                break;
            case 'week':
                return Transaction::whereBetween('transaction_date', [$date->startOfWeek(), $date->endOfWeek()])
                    ->where('user_id', $this->user->id)
                    ->orderBy('transaction_date', 'desc')
                    ->count();
                break;
        }
    }

    #[Computed()]
    public function recentTransactions()
    {
        return Transaction::with(['transactionable'])
            ->where('user_id', $this->user->id)
            ->orderBy('transaction_date', 'desc')
            ->limit(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.user.dashboard', [
            'totalPrograms' => $this->totalPrograms,
            'totalInvestments' => $this->totalInvestments,
            'totalTransactions' => $this->totalTransactions,
            'recentTransactions' => $this->recentTransactions,
        ]);
    }
}
