<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
        /**
     * Seed the application's database.
     */
    public function run(): void
    {
       DB::table('users')->insert([
            'name' => 'apoteker',
            'email' => 'apoteker@gmail.com',
            'password' => Hash::make('2Juli2004!'),
            'level' => 'apoteker',
            'aktif' => '1',
            'created_at' => now(),
            'updated_at' => now(),
       ]);
       DB::table('users')->insert([
            'name' => 'gudang',
            'email' => 'gudang@gmail.com',
            'password' => Hash::make('2Juli2004!'),
            'level' => 'gudang',
            'aktif' => '1',
            'created_at' => now(),
            'updated_at' => now(),
       ]);
       DB::table('users')->insert([
            'name' => 'kasir',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('2Juli2004!'),
            'level' => 'kasir',
            'aktif' => '1',
            'created_at' => now(),
            'updated_at' => now(),
       ]);
       DB::table('users')->insert([
            'name' => 'pemilik',
            'email' => 'pemilik@gmail.com',
            'password' => Hash::make('2Juli2004!'),
            'level' => 'pemilik',
            'aktif' => '1',
            'created_at' => now(),
            'updated_at' => now(),
       ]);
    }
}
