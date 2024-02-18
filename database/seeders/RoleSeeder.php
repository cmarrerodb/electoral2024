<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1=Role::create(['name' => 'Admin']);
        $role2=Role::create(['name' => 'Blogger']);

        Permission::create(['name' => 'admin.workers.index','description' => 'Ver trabajadores'])->syncRoles([ $role1, $role2 ]);
        Permission::create(['name' => 'admin.workers.create','description' => 'Crear trabajador'])->syncRoles([ $role1, $role2 ]);;
        Permission::create(['name' => 'admin.workers.edit','description' => 'Editar trabajador'])->syncRoles([ $role1, $role2 ]);;
        Permission::create(['name' => 'admin.workers.destroy','description' => 'Eliminar trabajador'])->syncRoles([ $role1, $role2 ]);;

    }
}
