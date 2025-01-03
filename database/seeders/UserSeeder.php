<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::query()->oldest('id')->first();

        $user = User::query()
            ->firstOrCreate(
                [
                    'email' => 'admin@admin.com',
                    'name' => 'Admin',
                    'password' => 'password',
                ]
            );

        $user->syncRoles($role->name);
    }
}
