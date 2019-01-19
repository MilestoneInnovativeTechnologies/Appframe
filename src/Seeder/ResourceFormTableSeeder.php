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
            ->create([	'id' => '1', 	'resource' => '1', 	'name' => 'NewUserForm', 	'description' => 'Form to create a new user', 	'title' => 'New User', 	'action_text' => 'Create User', 										])
            ->create([	'id' => '2', 	'resource' => '1', 	'name' => 'UpdateUserForm', 	'description' => 'Form to update a user details', 	'title' => 'Update User', 	'action_text' => 'Update', 										])
            ->create([	'id' => '3', 	'resource' => '1', 	'name' => 'ChangeUserPassword', 	'description' => 'Form to change user password', 	'title' => 'Change Password', 	'action_text' => 'Change', 										])
            ->create([	'id' => '4', 	'resource' => '4', 	'name' => 'NewResourceForm', 	'description' => 'Form to create a new resource', 	'title' => 'New Resource', 	'action_text' => 'Create Resource', 										])
            ->create([	'id' => '5', 	'resource' => '30', 	'name' => 'NewActionForm', 	'description' => 'Form to create a new Action', 	'title' => 'New Action', 	'action_text' => 'Create Action', 										])
            ->create([	'id' => '6', 	'resource' => '30', 	'name' => 'AddActionForm', 	'description' => 'Add a action to the selected resource', 	'title' => 'Add Action', 	'action_text' => 'Add Action', 										])
            ->create([	'id' => '7', 	'resource' => '8', 	'name' => 'NewFormForm', 	'description' => 'Form to create a form', 	'title' => 'New Resource Form', 	'action_text' => 'Create Form', 										])
            ->create([	'id' => '8', 	'resource' => '8', 	'name' => 'AddResourceForm', 	'description' => 'Form to be added from resource', 	'title' => 'New Resource Form', 	'action_text' => 'Create Form', 										])
            ->create([	'id' => '9', 	'resource' => '9', 	'name' => 'CreateFormField', 	'description' => 'Create a field for a form', 	'title' => 'Create Field', 	'action_text' => 'Create Field', 										])
            ->create([	'id' => '10', 	'resource' => '20', 	'name' => 'CreateListForm', 	'description' => 'form to create a new resource list', 	'title' => 'New List', 	'action_text' => 'Create List', 										])
            ->create([	'id' => '11', 	'resource' => '20', 	'name' => 'AddResourceList', 	'description' => 'Add a list to a selected resource', 	'title' => 'Add a list', 	'action_text' => 'Add List', 										])
            ->create([	'id' => '12', 	'resource' => '25', 	'name' => 'CreateDataForm', 	'description' => 'Form to create a data', 	'title' => 'Create Data', 	'action_text' => 'Create Data', 										])
            ->create([	'id' => '13', 	'resource' => '25', 	'name' => 'AddDataForm', 	'description' => 'Add a data to a selected resource', 	'title' => 'Add Data', 	'action_text' => 'Add Data', 										])
            ->create([	'id' => '14', 	'resource' => '2', 	'name' => 'NewGroupForm', 	'description' => 'Form to create a user group', 	'title' => 'Create Group', 	'action_text' => 'Create Group', 										])
            ->create([	'id' => '15', 	'resource' => '3', 	'name' => 'NewRoleForm', 	'description' => 'Form to create a new role', 	'title' => 'Create Role', 	'action_text' => 'Create Role', 										])
            ->create([	'id' => '16', 	'resource' => '5', 	'name' => 'AddRoleResourceForm', 	'description' => 'Form to add a resource to a role', 	'title' => 'Add Resource', 	'action_text' => 'Add Resource', 										])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
