<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name'=>'admin']);
        $adminStaff = Role::create(['name'=>'staff']);
        $permissions = [
            'staff.index',
            'staff.create',
            'staff.edit',
            'staff.delete',
        ];
        foreach($permissions as $data){
            $permission = Permission::create(['name' => $data]);
            $adminRole->givePermissionTo($permission);
        }
    }
}
