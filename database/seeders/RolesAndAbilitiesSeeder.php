<?php
// In a migration or seeder file

namespace Database\Seeders;

use App\Models\File;
use App\Models\User;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;

class RolesAndAbilitiesSeeder extends Seeder
{
    public function run()
    {
        $admin = Bouncer::role()->firstOrCreate([
            'name' => 'admin',
            'title' => 'Administrator',
        ]);

        $normal_user = Bouncer::role()->firstOrCreate([
            'name' => 'normal_user',
            'title' => 'Normal User',
        ]);

        $super_admin = Bouncer::role()->firstOrCreate([
            'name' => 'super_admin',
            'title' => 'Super Administrator',
        ]);

        $ban = Bouncer::ability()->firstOrCreate([
            'name' => 'ban-users',
            'title' => 'Ban users',
        ]);

        $delete_file = Bouncer::ability()->firstOrCreate([
            'name' => 'delete_file',
            'title' => 'Delete File',
        ]);

        $view_file = Bouncer::ability()->firstOrCreate([
            'name' => 'view_file',
            'title' => 'View File',
        ]);

        $edit_file = Bouncer::ability()->firstOrCreate([
            'name' => 'edit_file',
            'title' => 'Edit File',
        ]);

        Bouncer::allow($admin)->to($ban);
        Bouncer::allow($normal_user)->to($view_file);


// Assuming $userId is the ID of the user you want to assign the 'admin' role
        $user = User::find(1);

        // Check if the user exists before attempting to assign the role
    if ($user) {
        // Assign the 'admin' role to the user
        Bouncer::assign('super_admin')->to($user);
    } else {
        // Handle the case where the user is not found
        // For example, show an error message or redirect
        // to a page indicating that the user was not found.
    }
}

}