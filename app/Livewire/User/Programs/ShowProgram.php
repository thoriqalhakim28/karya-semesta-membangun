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

        $this->isFollowed = $this->program->users->contains(Auth::user()->id);
    }

    public function follow($id)
    {
        UserProgram::create([
            'user_id' =>  Auth::user()->id,
            'program_id' => $id
        ]);

        $this->isFollowed = true;
    }

    public function render()
    {
        return view('livewire.user.programs.show-program');
    }
}
