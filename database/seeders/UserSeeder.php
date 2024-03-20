<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(10)
            ->hasInvoices(5)
            ->create();

        User::factory()
            ->count(50)
            ->hasInvoices(8)
            ->create();

        User::factory()
            ->count(200)
            ->hasInvoices(1)
            ->create();

        User::factory()
            ->count(60)
            ->create();
    }
}
