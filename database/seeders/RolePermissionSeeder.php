<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\RolePermission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role_has_permission::create([ //  PAREI AQUI ESSE MODEL NAO EXISTE
            // DA O REFRESH PARA VER O ERROR
            // sail artisan migrate:fresh --seed
            'permission_id' => 1,
            'role_id' => 1
        ]);

        Role_has_permission::create([
            'permission_id' => 2,
            'role_id' => 1
        ]);
        
        Role_has_permission::create([
            'permission_id' => 3,
            'role_id' => 1
        ]);

        Role_has_permission::create([
            'permission_id' => 4,
            'role_id' => 1
        ]);

        Role_has_permission::create([
            'permission_id' => 3,
            'role_id' => 2
        ]);
    }
}
