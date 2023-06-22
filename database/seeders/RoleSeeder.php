<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role=Role::create(['name' => 'SuperAdmin']);
        $role2=Role::create(['name' => 'Invitado']);
        Permission::create(['name' => 'dashboard'])->syncRoles([$role]);

        Permission::create(['name' => 'departments.list'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'departments.create'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'departments.edit'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'departments.destroy'])->syncRoles([$role]);

        Permission::create(['name' => 'employees.list'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'employees.create'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'employees.edit'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'employees.destroy'])->syncRoles([$role]);

        Permission::create(['name' => 'workplaces.list'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'workplaces.create'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'workplaces.edit'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'workplaces.destroy'])->syncRoles([$role]);

        Permission::create(['name' => 'managers.list'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'managers.create'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'managers.edit'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'managers.destroy'])->syncRoles([$role]);

        Permission::create(['name' => 'statuses.list'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'statuses.create'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'statuses.edit'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'statuses.destroy'])->syncRoles([$role]);

        Permission::create(['name' => 'attendances.list'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'attendances.create'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'attendances.edit'])->syncRoles([$role, $role2]);
        Permission::create(['name' => 'attendances.destroy'])->syncRoles([$role]);


        Permission::create(['name' => 'usuarios.listar'])->syncRoles([$role]);
        Permission::create(['name' => 'usuarios.crear'])->syncRoles([$role]);
        Permission::create(['name' => 'usuarios.editar'])->syncRoles([$role]);
        Permission::create(['name' => 'usuarios.eliminar'])->syncRoles([$role]);

        Permission::create(['name' => 'roles.listar'])->syncRoles([$role]);
        Permission::create(['name' => 'roles.visualizar'])->syncRoles([$role]);
        Permission::create(['name' => 'roles.crear'])->syncRoles([$role]);
        Permission::create(['name' => 'roles.editar'])->syncRoles([$role]);
        Permission::create(['name' => 'roles.eliminar'])->syncRoles([$role]);
    }
}
