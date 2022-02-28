<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'Administrador@gmail.com',
            'password' => bcrypt('1234567890'),
        ])->assignRole('Admin');

        User::create([
            'name' => 'Administrador2',
            'email' => 'Administrador2@gmail.com',
            'password' => bcrypt('1234567890'),
        ])->assignRole('Admin');

        User::create([
            'name' => 'Administrador3',
            'email' => 'Administrador3@gmail.com',
            'password' => bcrypt('1234567890'),
        ])->assignRole('Admin');



        User::create([
            'name' => 'Secretaria',
            'email' => 'Secretaria@gmail.com',
            'password' => bcrypt('1234567890'),
        ])->assignRole('Secre');

        User::create([
            'name' => 'Secretaria2',
            'email' => 'Secretaria2@gmail.com',
            'password' => bcrypt('1234567890'),
        ])->assignRole('Secre');

        User::create([
            'name' => 'Secretaria3',
            'email' => 'Secretaria3@gmail.com',
            'password' => bcrypt('1234567890'),
        ])->assignRole('Secre');

        User::create([
            'name' => 'Docente',
            'email' => 'Docente@gmail.com',
            'password' => bcrypt('1234567890'),
        ])->assignRole('Docente');

        User::create([
            'name' => 'Docente2',
            'email' => 'Docente2@gmail.com',
            'password' => bcrypt('1234567890'),
        ])->assignRole('Docente');

        User::create([
            'name' => 'Docente3',
            'email' => 'Docente3@gmail.com',
            'password' => bcrypt('1234567890'),
        ])->assignRole('Docente');



        User::create([
            'name' => 'Raul Medina',
            'email' => 'minikus2773@gmail.com',
            'password' => bcrypt('1234567890'),
        ])->assignRole('Alum');


        User::create([
            'name' => 'Alumno',
            'email' => 'Alumno@gmail.com',
            'password' => bcrypt('1234567890'),
        ])->assignRole('Alum');

        User::create([
            'name' => 'Alumno2',
            'email' => 'Alumno2@gmail.com',
            'password' => bcrypt('1234567890'),
        ])->assignRole('Alum');

        User::create([
            'name' => 'Alumno3',
            'email' => 'Alumno3@gmail.com',
            'password' => bcrypt('1234567890'),
        ])->assignRole('Alum');
    }
}
