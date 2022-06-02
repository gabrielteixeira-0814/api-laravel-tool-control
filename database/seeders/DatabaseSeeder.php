<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

       
        $this->call(TurnTableSeeder::class);
        $this->call(OfficeTableSeeder::class);
        $this->call(SectorTableSeeder::class);
        //$this->call(UserTableSeeder::class);

        // Tools
        $this->call(MarkTableSeeder::class);
        $this->call(ModelsTableSeeder::class);
       // $this->call(Tool_statusTableSeeder::class);
        
    }
}
