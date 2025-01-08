<?php

namespace App\Livewire\Admin;

use App\Models\Investment;
use App\Models\Program;
use App\Models\Transaction;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class Dashboard extends Component
{
    public $period = 'month';

    #[Computed()]
    public function programCount()
    {
        return Program::count();
    }

    #[Computed()]
    public function investmentCount()
    {
        return Investment::count();
    }

    #[Computed()]
    public function userCount()
    {
        return User::role('user')->count();
    }

    #[Computed()]
    public function totalTransactions()
    {
        $date = Carbon::now();

        switch ($this->period) {
            case 'year':
                return Transaction::whereYear('transaction_date', date('Y'))
                    ->orderBy('transaction_date', 'desc')
                    ->count();
                break;
            case 'month':
                return Transaction::whereMonth('transaction_date', date('m'))
                    ->whereYear('transaction_date', date('Y'))
                    ->orderBy('transaction_date', 'desc')
                    ->count();
                break;
            case 'week':
                return Transaction::whereBetween('transaction_date', [$date->startOfWeek(), $date->endOfWeek()])
                    ->orderBy('transaction_date', 'desc')
                    ->count();
                break;
        }
    }

    #[Computed()]
    public function recentTransactions()
    {
        return Transaction::with(['transactionable', 'user'])
            ->orderBy('transaction_date', 'desc')
            ->limit(5)
            ->get();
    }

    public function render()
    {

        Debugbar::info($this->totalTransactions);

        return view('livewire.admin.dashboard', [
            'programs' => $this->programCount,
            'investments' => $this->investmentCount,
            'users' => $this->userCount,
            'transactions' => $this->totalTransactions,
            'recentTransactions' => $this->recentTransactions
        ]);
    }
}
