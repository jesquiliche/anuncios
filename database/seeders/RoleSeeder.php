<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear roles
        $adminRole = Role::create(['name' => 'Admin']);
        $editorRole = Role::create(['name' => 'Editor']);

        // Crear permisos
        Permission::create(['name' => 'admin.home']);
		Permission::create(['name' => 'admin.user.index']);
		Permission::create(['name' => 'admin.user.create']);
		Permission::create(['name' => 'admin.user.edit']);
		Permission::create(['name' => 'admin.user.destroy']);
        Permission::create(['name' => 'admin.categoria.index']);
        Permission::create(['name' => 'admin.categoria.create']);
        Permission::create(['name' => 'admin.categoria.edit']);
        Permission::create(['name' => 'admin.categoria.destroy']);
        Permission::create(['name' => 'admin.subcategorias.index']);
        Permission::create(['name' => 'admin.subcategorias.create']);
        Permission::create(['name' => 'admin.subcategorias.edit']);
        Permission::create(['name' => 'admin.subcategorias.destroy']);
      
        // Asignar permisos a roles
        $adminRole->givePermissionTo([
            'admin.home',
            'admin.categoria.index',
            'admin.categoria.create',
            'admin.categoria.edit',
            'admin.categoria.destroy',
            'admin.subcategorias.index',
            'admin.subcategorias.create',
            'admin.subcategorias.edit',
            'admin.subcategorias.destroy',
           	'admin.user.index',
			'admin.user.create',
			'admin.user.edit',
			'admin.user.destroy'
        ]);

        $editorRole->givePermissionTo([
            'admin.home',
            'admin.categoria.index',
            'admin.categoria.create',
            'admin.categoria.edit',
            'admin.categoria.destroy',
            'admin.subcategorias.index',
            'admin.subcategorias.create',
            'admin.subcategorias.edit',
            'admin.subcategorias.destroy'
        ]);

        // Crear usuario administrador
        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        //Asignar Role al usuario
        $adminUser->assignRole($adminRole);

        //Crear usuario editor
        $editorUser = User::create([
            'name' => 'Editor User',
            'email' => 'editor@example.com',
            'password' => bcrypt('password'),
        ]);
    
        //Asignar Role de
        $editorUser->assignRole($editorRole);
    }
}
