<?php
namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = false;

    protected $rules = [
        'email'    => ['required', 'email'],
        'password' => ['required'],
    ];

    public function authenticate()
    {
        $this->validate();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->flash('error', trans('Email atau password salah'));
            return;
        }

        return redirect()->intended(
            Auth::user()->hasRole('admin') ? route('admin.dashboard') : route('user.dashboard')
        );
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth');
    }
}
