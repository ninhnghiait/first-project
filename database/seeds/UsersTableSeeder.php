<?php

use App\Model\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadministratorRole = Role::where('name', 'superadministrator')->first();
        $administratorRole = Role::where('name', 'administrator')->first();
        $userRole = Role::where('name', 'user')->first();
        
        $superadministrator = User::create([
            'name' => 'superadministrator', 
            'email' => 'superadministrator@ninhnghiait.dev',
            'password' => bcrypt('123456')
        ]);
        $superadministrator->roles()->attach($superadministratorRole);
        
        $administrator = User::create([
            'name' => 'administrator', 
            'email' => 'administrator@ninhnghiait.dev',
            'password' => bcrypt('123456')
        ]);
        $administrator->roles()->attach($administratorRole);
        
        $user1 = User::create([
            'name' => 'user1', 
            'email' => 'user1@ninhnghiait.dev',
            'password' => bcrypt('123456')
        ]);
        $user1->roles()->attach($userRole);

        $user2 = User::create([
            'name' => 'user2', 
            'email' => 'user2@ninhnghiait.dev',
            'password' => bcrypt('123456')
        ]);
        $user2->roles()->attach($userRole);
    }
}
