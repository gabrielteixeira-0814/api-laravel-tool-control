<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User::factory()->count(1)->create()->roles()->attach(1);
        //User::factory()->count(1)->create()->roles()->attach(2);

        User::create([
            'name' => 'Gabriel Teixeira',
            'email' => "wmann@example.net",
            'cpf' => '1265416',
            'matricula' => '154564',
            'image' => 'image.png',
            'turn_id' => 1,
            'office_id' => 1,
            'sector_id' => 1,
            'password' => bcrypt('123456'), // password
            'remember_token' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ])->roles()->attach([1,2]); // ->roles()->attach([1,2]); Insere as funções

        User::create([
            'name' => 'Daniela Prado',
            'email' => "daniela@example.net",
            'cpf' => '126541689',
            'matricula' => '154564452',
            'image' => 'image.png',
            'turn_id' => 1,
            'office_id' => 1,
            'sector_id' => 1,
            'password' => bcrypt('123456'), // password
            'remember_token' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ])->roles()->attach(2);

        User::create([
            'name' => 'Josi Teixeira',
            'email' => "josi@example.net",
            'cpf' => '126541683',
            'matricula' => '154564453',
            'image' => 'image.png',
            'turn_id' => 1,
            'office_id' => 1,
            'sector_id' => 1,
            'password' => bcrypt('123456'), // password
            'remember_token' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ])->roles()->attach(3);
    }
}
