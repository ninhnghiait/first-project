<?php

use App\Model\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$view_user = Permission::create([
            'name' => 'user.view', 
            'display_name' => 'Xem tài khoản',
            'description' => 'Xem tài khoản'
        ]);
        $create_user = Permission::create([
            'name' => 'user.create', 
            'display_name' => 'Tạo tài khoản mới',
            'description' => 'Tạo tài khoản mới'
        ]);
        $update_user = Permission::create([
            'name' => 'user.update', 
            'display_name' => 'Chỉnh sửa tài khoản',
            'description' => 'Chỉnh sửa tài khoản'
        ]);
        $delete_user = Permission::create([
            'name' => 'user.delete', 
            'display_name' => 'Xóa tài khoản',
            'description' => 'Xóa tài khoản'
        ]);
        $active_user = Permission::create([
            'name' => 'user.active', 
            'display_name' => 'Kích hoạt hay hạn chế tài khoản',
            'description' => 'Kích hoạt hay hạn chế tài khoản'
        ]);

        $view_profile = Permission::create([
            'name' => 'profile.view', 
            'display_name' => 'Xem profile',
            'description' => 'Xem tài khoản của mình'
        ]);
        $create_profile = Permission::create([
            'name' => 'profile.create', 
            'display_name' => 'Tạo profile',
            'description' => 'Xem tài khoản của mình'
        ]);
        $update_profile = Permission::create([
            'name' => 'profile.update', 
            'display_name' => 'Cập nhật profile',
            'description' => 'Cập nhật tài khoản của mình'
        ]);
        $delete_profile = Permission::create([
            'name' => 'profile.delete', 
            'display_name' => 'Xóa profile',
            'description' => 'Xóa tài khoản của mình'
        ]);

        $view_role = Permission::create([
            'name' => 'role.view', 
            'display_name' => 'Xem role',
            'description' => 'Xem role'
        ]);
        $create_role = Permission::create([
            'name' => 'role.create', 
            'display_name' => 'Tạo mới role',
            'description' => 'Tạo mới role'
        ]);
        $update_role = Permission::create([
            'name' => 'role.update', 
            'display_name' => 'Tạo mới role',
            'description' => 'Tạo mới role'
        ]);
        $delete_role = Permission::create([
            'name' => 'role.delete', 
            'display_name' => 'Xóa role',
            'description' => 'Xóa role'
        ]);

        $view_post = Permission::create([
            'name' => 'post.view', 
            'display_name' => 'Xem bài viết',
            'description' => 'Xem bài viết'
        ]);
        $create_post = Permission::create([
            'name' => 'post.create', 
            'display_name' => 'Viết bài mới',
            'description' => 'Viết bài mới'
        ]);
        $update_post = Permission::create([
            'name' => 'post.update', 
            'display_name' => 'Biên tập bài viết',
            'description' => 'Duyệt bài trước khi đăng'
        ]);
        $delete_post = Permission::create([
            'name' => 'post.delete', 
            'display_name' => 'Xóa bài viết',
            'description' => 'Xóa bài viết'
        ]);
        $publish_post = Permission::create([
            'name' => 'post.publish', 
            'display_name' => 'Xuất bản',
            'description' => 'Xuất bản bài viết lên trang chủ'
        ]);
    }
}
