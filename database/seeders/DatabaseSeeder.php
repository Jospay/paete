<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            RolePermissionSeeder::class,
        ]);

        foreach (RoleEnum::cases() as $role) {
            $user = User::factory()->create([
                'first_name' => str($role->value)
                    ->replace('_', ' ')
                    ->title()
                    ->explode(' ')
                    ->first(),
                'last_name' => 'User',
                'email' => strtolower(str($role->value)->replace('_', '.')) . '@example.com',
                'password' => Hash::make('password'),
            ]);

            $user->assignRole($role);
        }

        // User::factory()
        //     ->count(1000)
        //     ->create()
        //     ->each(function (User $user) {
        //         $user->assignRole(RoleEnum::CUSTOMER);
        //     });

        // User::factory()->create([
        //     'first_name' => 'Test',
        //     'last_name' => 'User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
