<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Program;
use App\Models\Investment;
use App\Models\UserDetail;
use App\Models\UserFamily;
use App\Models\Transaction;
use App\Models\UserAddress;
use App\Models\UserContact;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataDummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            DB::beginTransaction();

            User::factory(50)->create();
            Program::factory(20)->create();
            Investment::factory(20)->create();

            $users = User::all();

            foreach ($users as $user) {
                UserDetail::factory()->create([
                    'user_id' => $user->id,
                ]);

                UserFamily::factory()->create([
                    'user_id' => $user->id,
                ]);

                UserAddress::factory()->create([
                    'user_id' => $user->id,
                ]);

                UserContact::factory()->create([
                    'user_id' => $user->id,
                ]);

                $user->assignRole('user');

                $randomPrograms = Program::inRandomOrder()->take(fake()->numberBetween(1, 5))->get();

                $user->programs()->attach($randomPrograms->pluck('id')->toArray(), [
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                foreach ($randomPrograms as $program) {
                    Transaction::create([
                        'user_id' => $user->id,
                        'transactionable_id' => $program->id,
                        'transactionable_type' => Program::class,
                        'transaction_date' => now(),
                        'transaction_type' => fake()->randomElement(['loyalty', 'personal']),
                        'amount' => fake()->randomFloat(2, 10000, 1000000),
                        'payment_method' => fake()->randomElement(['bank_transfer', 'credit_card', 'e-wallet']),
                    ]);
                }

                $randomInvestments = Investment::inRandomOrder()
                    ->take(fake()->numberBetween(1, 3))
                    ->get();

                $user->investments()->attach($randomInvestments->pluck('id')->toArray(), [
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                foreach ($randomInvestments as $investment) {
                    Transaction::create([
                        'user_id' => $user->id,
                        'transactionable_id' => $investment->id,
                        'transactionable_type' => Investment::class,
                        'transaction_date' => now(),
                        'amount' => fake()->randomFloat(2, 10000, 1000000),
                        'payment_method' => fake()->randomElement(['bank_transfer', 'credit_card', 'e-wallet']),
                    ]);
                }
            }
            DB::commit();
        } catch (\Throwable $th) {
            throw $th;

            DB::rollBack();
        }
    }
}
