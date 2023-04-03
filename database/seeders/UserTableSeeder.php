<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'yoshifumi',
            'email' => 'yoshifumi@example.com',
            'password' => Hash::make('password'),
            'roll' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
