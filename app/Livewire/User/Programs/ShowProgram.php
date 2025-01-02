<?php

namespace App\Livewire\User\Programs;

use App\Models\Program;
use App\Models\UserProgram;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.user')]
class ShowProgram extends Component
{
    public $program;

    public bool $isFollowed = false;

    public function mount($id)
    {
        $this->program = Program::with('users')->findOrFail($id);

        $userId = Auth::user()->id;

        $this->isFollowed = $this->program->users->contains($userId);
    }

    public function follow()
    {
        $userId = Auth::user()->id;

        UserProgram::create([
            'user_id' => $userId,
            'program_id' => $this->program->id
        ]);

        $this->isFollowed = true;
    }

    public function render()
    {
        return view('livewire.user.programs.show-program');
    }
}
