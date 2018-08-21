<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceActionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $_ = \DB::statement('SELECT @@GLOBAL.foreign_key_checks');
        \DB::statement('set foreign_key_checks = 0');
        \Milestone\Appframe\ResourceAction::truncate()
            ->create([	'resource' => '1', 	'name' => 'CreateUser', 	'description' => 'Create a new user', 	'title' => 'Create a new user', 	'type' => 'outline-info', 	'menu' => 'New User', 	'icon' => 'user-plus', 	'set' => 'fas', 								])
            ->create([	'resource' => '1', 	'name' => 'CreateAdministrator', 	'description' => 'Create a new Administrator User', 	'title' => 'New Administrator', 	'type' => 'outline-info', 	'menu' => 'New Administrator', 	'icon' => 'user-graduate', 	'set' => 'fas', 								])
            ->create([	'resource' => '1', 	'name' => 'CreateDeveloper', 	'description' => 'Create a new Developer User', 	'title' => 'New Developer', 	'type' => 'outline-info', 	'menu' => 'New Developer', 	'icon' => 'user-cog', 	'set' => 'fas', 								])
            ->create([	'resource' => '1', 	'name' => 'AllUsersList', 	'description' => 'List All Users', 	'title' => 'Users', 	'type' => 'outline-info', 	'menu' => 'All Users', 	'icon' => 'users', 	'set' => 'fas', 								])
            ->create([	'resource' => '1', 	'name' => 'AllAdministratorsList', 	'description' => 'List All Administrators', 	'title' => 'Administrators', 	'type' => 'outline-info', 	'menu' => 'Administrators', 	'icon' => 'user-shield', 	'set' => 'fas', 								])
            ->create([	'resource' => '1', 	'name' => 'AllDevelopersList', 	'description' => 'List All Developers', 	'title' => 'Developers', 	'type' => 'outline-info', 	'menu' => 'Developers', 	'icon' => 'user-graduate', 	'set' => 'fas', 								])
            ->create([	'resource' => '1', 	'name' => 'ViewAdministrator', 	'description' => 'View details of administrators', 	'title' => 'View', 	'type' => 'outline-info', 		'icon' => 'user-check', 	'set' => 'fas', 								])
            ->create([	'resource' => '1', 	'name' => 'ViewDeveloper', 	'description' => 'View details of developer', 	'title' => 'View', 	'type' => 'outline-info', 		'icon' => 'user-check', 	'set' => 'fas', 								])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
