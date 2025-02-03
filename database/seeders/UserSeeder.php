<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserContact;
use App\Models\UserDetail;
use App\Models\UserFamily;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory(50)->create();

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
        }
    }
}
