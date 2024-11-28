<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::firstOrCreate(["name" => "Victor Mussel"], [
            'name' => 'Victor Mussel',
            'email' => 'victor.mussel@hotmail.com',
            'role' => 'Super-Admin',
            'password' => 'teste123', //'$2y$10$eMMXLkP579E/hf8.oSBJRu.yndQDIU0XrjRsY/R9Sr6hxzjToy0gC', 
        ]);
    }
}
