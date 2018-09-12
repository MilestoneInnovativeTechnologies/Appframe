<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceForm::truncate()
            ->create([	'resource' => '1', 	'name' => 'CreateUser', 	'description' => 'Create a User with already created group', 	'title' => 'Create User', 	'action_text' => 'Create User', 											])
            ->create([	'resource' => '1', 	'name' => 'CreateUserAdministrator', 	'description' => 'Create a User belongs to Administrator Group', 	'title' => 'Create Administrator', 	'action_text' => 'Create Administrator', 											])
            ->create([	'resource' => '1', 	'name' => 'CreateUserDeveloper', 	'description' => 'Create a User belongs to Developer Group', 	'title' => 'Create Developer', 	'action_text' => 'Create Developer', 											])
            ->create([	'resource' => '2', 	'name' => 'CreateGroup', 	'description' => 'Create a user group', 	'title' => 'Create Group', 	'action_text' => 'Create Group', 											])
            ->create([	'resource' => '3', 	'name' => 'CreateRole', 	'description' => 'Create a Role', 	'title' => 'Create Role', 	'action_text' => 'Create Role', 											])
            ->create([	'resource' => '4', 	'name' => 'CreateResource', 	'description' => 'Setup a new Resource', 	'title' => 'Resource', 	'action_text' => 'Setup', 											])
            ->create([	'resource' => '5', 	'name' => 'SetupOrganisation', 	'description' => 'Enter details of the organisation', 	'title' => 'Organisation Details', 	'action_text' => 'Setup', 											])
            ->create([	'resource' => '1', 	'name' => 'EditAdministrator', 	'description' => 'Edit administrator details', 	'title' => 'Edit Administrator', 	'action_text' => 'Update Administrator', 											])
            ->create([	'resource' => '1', 	'name' => 'EditDeveloper', 	'description' => 'Edit developer details', 	'title' => 'Edit Developer', 	'action_text' => 'Update Dveloper', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
