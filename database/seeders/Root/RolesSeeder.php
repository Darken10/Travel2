<?php

namespace Database\Seeders\Root;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' =>'Root'
        ]);
        Role::create([
            'name' =>'Admin'
        ]);
        Role::create([
            'name' =>'user'
        ]);
    }
}
