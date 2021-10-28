<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$permissions = [
           'list role',
           'create role',
           'edit role',
           'create permission',
        ];*/

        /*$descriptions = [
           'The user can view list of roles',
           'The user can create roles',
           'The user can edit roles',
           'The user can create permissions',
        ];*/

        DB::table('permissions')->insert([
           [
            'name' => 'list role',
            'description' => 'The user can view list of roles',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
           ],
           [
            'name' => 'create role',
            'description' => 'The user can create roles',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
           ],
           [
            'name' => 'edit role',
            'description' => 'The user can edit roles',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
           [
            'name' => 'create permission',
            'description' => 'The user can create permissions',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
             [
            'name' => 'show dashboard',
            'description' => 'The user can see dashboard',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
             [
            'name' => 'receive notification',
            'description' => 'The user can receive notification',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
             [
            'name' => 'create appointments',
            'description' => 'The user can create appointments',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
             [
            'name' => 'manage users',
            'description' => 'The user can manage users',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
             [
            'name' => 'create user',
            'description' => 'The user/admin can create user',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
             [
            'name' => 'manage account',
            'description' => 'The user can manage his/her account',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
             [
            'name' => 'manage patient',
            'description' => 'The user/admin can manage patients',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
            [
            'name' => 'manage medicines',
            'description' => 'The user can manage medicines',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
             [
            'name' => 'manage supply',
            'description' => 'The user/admin can manage supply',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
             [
            'name' => 'print reports',
            'description' => 'The user/admin can print reports',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
            [
             'name' => 'manage services',
            'description' => 'The user/admin can manage services',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
            [ 
            'name' => 'manage website',
            'description' => 'The user/admin can manage website',
            'guard_name' => 'web',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ],
        ]);
        
        
     
      /*  foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }*/

       /* foreach ($descriptions as $description) {
             Permission::create(['description' => $description]);
        }*/
    }
}
