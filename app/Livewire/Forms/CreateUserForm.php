<?php
namespace App\Livewire\Forms;

use App\Models\User;
use App\Models\UserInvestment;
use App\Models\UserProgram;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateUserForm extends Form
{
    public $dataPrograms    = [["program" => ""]];
    public $dataInvestments = [["investment" => ""]];

    #[Validate]
    public $name;

    #[Validate]
    public $email;

    #[Validate]
    public $phone;

    #[Validate]
    public $gender;

    #[Validate]
    public $password = '';

    #[Validate]
    public $passwordConfirmation = '';

    public function rules()
    {
        return [
            'name'                         => 'required|string',
            'email'                        => 'required|email|unique:users',
            'phone'                        => 'required|numeric',
            'password'                     => 'required|min:8|same:passwordConfirmation',
            'gender'                       => 'required|string|in:laki-laki,perempuan',
            'dataInvestments.*.investment' => 'required',
            'dataPrograms.*.program'       => 'required',
        ];
    }

    public function validateStep($step)
    {
        $rules = match ($step) {
            1 => [
                'name'   => 'required|string',
                'email'  => 'required|email|unique:users',
                'phone'  => 'required|numeric',
                'gender' => 'required|string|in:laki-laki,perempuan',
            ],
            2 => [
                'dataInvestments.*.investment' => 'required',
                'dataPrograms.*.program'       => 'required',
            ],
            3 => [
                'password' => 'required|min:8|same:passwordConfirmation',
            ],
            default => [],
        };

        return $this->validate($rules);
    }

    protected function messages()
    {
        return [
            'name.required'                         => 'Nama harus diisi.',
            'email.required'                        => 'Email harus diisi.',
            'email.email'                           => 'Format email tidak valid.',
            'email.unique'                          => 'Email sudah terdaftar.',
            'phone.required'                        => 'Nomor telepon harus diisi.',
            'phone.numeric'                         => 'Nomor telepon harus berupa angka.',
            'gender.required'                       => 'Jenis kelamin harus diisi.',
            'gender.in'                             => 'Jenis kelamin tidak valid.',
            'password.required'                     => 'Kata sandi harus diisi.',
            'password.min'                          => 'Kata sandi harus memiliki minimal 8 karakter.',
            'password.same'                         => 'Kata sandi dan konfirmasi kata sandi harus sama.',
            'dataInvestments.*.investment.required' => 'Investment harus dipilih',
            'dataPrograms.*.program.required'       => 'Program harus dipilih',
        ];
    }

    public function save()
    {
        $this->validate();

        try {
            DB::beginTransaction();

            $user = User::create([
                'name'     => $this->name,
                'email'    => $this->email,
                'password' => Hash::make($this->password),
            ]);

            $user->contact()->create([
                'phone_number' => $this->phone,
            ]);

            $user->detail()->create([
                'gender' => $this->gender,
            ]);

            $user->assignRole('user');

            foreach ($this->dataInvestments as $item) {
                UserInvestment::create([
                    'user_id'       => $user->id,
                    'investment_id' => $item['investment'],
                ]);
            }

            foreach ($this->dataPrograms as $item) {
                UserProgram::create([
                    'user_id'    => $user->id,
                    'program_id' => $item['program'],
                ]);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
