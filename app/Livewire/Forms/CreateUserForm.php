<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateUserForm extends Form
{
    #[Validate]
    public $name = '';

    #[Validate]
    public $email = '';

    #[Validate]
    public $phoneNumber;

    #[Validate]
    public $password = '';

    #[Validate]
    public $passwordConfirmation = '';

    protected function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phoneNumber' => 'required|numeric',
            'password' => 'required|min:8|same:passwordConfirmation',
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'phoneNumber.required' => 'Nomor telepon harus diisi.',
            'phoneNumber.numeric' => 'Nomor telepon harus berupa angka.',
            'password.required' => 'Kata sandi harus diisi.',
            'password.min' => 'Kata sandi harus memiliki minimal 8 karakter.',
            'password.same' => 'Kata sandi dan konfirmasi kata sandi harus sama.',
        ];
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            $user->contact()->create([
                'phone_number' => $this->phoneNumber
            ]);

            $user->detail()->create();

            DB::commit();
        } catch (\Throwable $th) {
            report($th);

            DB::rollBack();
        }
    }
}
