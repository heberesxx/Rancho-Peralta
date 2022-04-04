<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $role = Role::create(['name' => 'writer']);
        // $permission = Permission::create(['name' => 'edit articles']);

        User::create([
            'name'=> 'ADMINISTRADOR',
            'username'=> 'ADMIN',
            'email'=> 'admin@yahoo.com',
            'password'=> bcrypt('123456789')
        ]);
    }
}
