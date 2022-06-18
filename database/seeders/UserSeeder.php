<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama_depan' => 'admin',
            'email' => 'admin@admin.com',
            'role' => 'Admin',
            'id_instansi'=> '1',
            'password' => Hash::make('12345'),
        ]);
    }
}
