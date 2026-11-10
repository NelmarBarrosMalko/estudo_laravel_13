<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserAddress;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $admin = User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
        ]);

        UserAddress::factory()->create(['user_id' => $admin->id]);

        // Extra users, each with one address
        User::factory(10)
            ->has(UserAddress::factory(), 'address')
            ->create();
    }
}
