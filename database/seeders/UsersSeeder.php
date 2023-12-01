<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = Role::create(['name'=>'usuario']);
        // el super administrador tiene control total
        $superAdmin = Role::create(['name'=>'super_admin']);
        // el admin solo se encarga de controlar tareas pequeñas(productos,imagenes,etc)
        $empleado = Role::create(['name'=>'empleado']);

        Permission::create(['name'=>'ver'])->syncRoles([$usuario]);
        
        Permission::create(['name'=>'acceso_total'])->syncRoles([$superAdmin]);
        Permission::create(['name'=>'crear_productos'])->syncRoles([$superAdmin]);
        Permission::create(['name'=>'editar_productos'])->syncRoles([$superAdmin,$empleado]);
        Permission::create(['name'=>'actualizar_productos'])->syncRoles([$superAdmin,$empleado]);
        Permission::create(['name'=>'deshabilitar_productos'])->syncRoles([$superAdmin]);

        Permission::create(['name'=>'editar_usuarios'])->syncRoles([$superAdmin,$empleado]);
        Permission::create(['name'=>'deshabilitar_usuarios'])->syncRoles([$superAdmin]);

        Permission::create(['name'=>'acceptar_pedidos'])->syncRoles([$superAdmin,$empleado]);
        Permission::create(['name'=>'cancelar_pedidos'])->syncRoles([$superAdmin,$empleado]);
        Permission::create(['name'=>'acceptar_recerva'])->syncRoles([$superAdmin,$empleado]);
    }
}
