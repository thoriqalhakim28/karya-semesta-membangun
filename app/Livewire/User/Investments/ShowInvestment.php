<?php

namespace App\Livewire\User\Investments;

use App\Models\Investment;
use App\Models\UserInvestment;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.user')]
class ShowInvestment extends Component
{
    public $investment;
    public bool $isFollowed = false;
    public $totalInvestment = 0;

    public function mount($id)
    {
        $this->investment = Investment::with('users')->findOrFail($id);

        $this->isFollowed = $this->investment->users->contains(Auth::user()->id);

        if ($this->isFollowed) {
            $this->totalInvestment = $this->investment->transactions()
                ->where('user_id', Auth::user()->id)
                ->sum('amount');
        }
    }

    public function getTransactionsProperty()
    {
        return $this->investment->transactions()
            ->where('user_id', Auth::user()->id)
            ->with('user')
            ->latest()
            ->paginate(10);
    }

    public function follow($id)
    {
        UserInvestment::create([
            'user_id' => Auth::user()->id,
            'investment_id' => $id
        ]);

        $this->isFollowed = true;
    }

    public function render()
    {
        return view('livewire.user.investments.show-investment', [
            'transactions' => $this->transactions
        ]);
    }
}
