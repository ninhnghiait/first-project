<?php

use App\Model\Permission;
use App\Model\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $post_view = Permission::where('name', 'post.view')->first()->id;
        // $post_create = Permission::where('name', 'post.create')->first()->id;
        // $post_update = Permission::where('name', 'post.update')->first()->id;
        // $post_delete = Permission::where('name', 'post.update')->first()->id;
        // $post_publish = Permission::where('name', 'post.publish')->first()->id;

        // $read_user = Permission::where('name', 'user.index')->first()->id;
        // $create_user = Permission::where('name', 'user.create')->first()->id;
        // $update_user = Permission::where('name', 'user.update')->first()->id;
        // $delete_user = Permission::where('name', 'user.delete')->first()->id;
        // $active_user = Permission::where('name', 'user.active')->first()->id;

        // $read_profile = Permission::where('name', 'profile.show')->first()->id;
        // $create_profile = Permission::where('name', 'profile.create')->first()->id;
        // $update_profile = Permission::where('name', 'profile.update')->first()->id;
        // $delete_profile = Permission::where('name', 'profile.delete')->first()->id;

        // $read_role = Permission::where('name', 'role.index')->first()->id;
        // $create_role = Permission::where('name', 'role.create')->first()->id;
        // $update_role = Permission::where('name', 'role.update')->first()->id;
        // $delete_role = Permission::where('name', 'role.delete')->first()->id;

    	$superadministrator = Role::create([
            'name' => 'superadministrator', 
            'display_name' => 'Superadministrator',
            'description' => 'Toàn quyền'
        ]);

        $administrator = Role::create([
            'name' => 'administrator', 
            'display_name' => 'Quản trị viên',
            'description' => 'Quản trị viên'
        ]);

        $user = Role::create([
            'name' => 'user', 
            'display_name' => 'Thành viên',
            'description' => 'Thành viên'
        ]);
    }
}
