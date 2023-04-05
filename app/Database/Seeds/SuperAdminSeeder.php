<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Shield\Entities\User;

class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        // Get the User Provider (UserModel by default)
        $users = auth()->getProvider();

        $user = new User([
            'username' => 'Super Admin',
            'email'    => 'superAdmin@super.com',
            'password' => '123@polls',
        ]);
        $users->save($user);

        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($users->getInsertID());

        // Add to default group
        $user->addGroup('superadmin');
    }
}
