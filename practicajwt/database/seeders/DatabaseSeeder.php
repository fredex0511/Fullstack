<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
            [
                'rol' => 'admin',
                'acciones' =>'GET, POST, PUT, DELETE'
            ],
            [
                'rol' => 'guest',
                'acciones' => 'GET'
            ],
            [
                'rol' => 'user',
                'acciones' => 'GET, POST, PUT'
            ],
        ]);

        DB::table('users')->insert([

            [
                'nombre' => 'Alfredo',
                'email' => 'acholico@gmail.com',
                'is_active' =>false,
                'role_id' => 1,
                'password' => Hash::make('password'),
            ],
            [
                'nombre' => 'Aranda',
                'email' => 'jranda@gmail.com',
                'is_active' =>false,
                'role_id' => '2',
                'password' => Hash::make('password'),
            ],
            [
                'nombre' => 'Tovar',
                'email' => 'atovar@gmail.com',
                'is_active' =>false,
                'role_id' => '2',
                'password' => Hash::make('password'),
            ],
            [
                'nombre' => 'Ricardo',
                'email' => 'rsanchez@gmail.com',
                'is_active' =>false,
                'role_id' => '2',
                'password' => Hash::make('password'),
            ],
            [
                'nombre' => 'Alejandro',
                'email' => 'agonzales@gmail.com',
                'is_active' =>false,
                'role_id' => '2',
                'password' => Hash::make('password'),
            ],
            [
                'nombre' => 'Jhonatan',
                'email' => 'jalejandro@gmail.com',
                'is_active' =>false,
                'role_id' => '2',
                'password' => Hash::make('password'),
            ],
            [
                'nombre' => 'Brandon',
                'email' => 'brodriguez@gmail.com',
                'is_active' =>false,
                'role_id' => '2',
                'password' => Hash::make('password'),
            ],
            [
                'nombre' => 'Fernanda',
                'email' => 'mdelacruz@gmail.com',
                'is_active' =>false,
                'role_id' => '2',
                'password' => Hash::make('password'),
            ],
            [
                'nombre' => 'Pepechuy',
                'email' => 'jchuy@gmail.com',
                'is_active' =>false,
                'role_id' => '2',
                'password' => Hash::make('password'),
            ],
        ]); 

    }
}
