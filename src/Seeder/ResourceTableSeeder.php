<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceTableSeeder extends Seeder
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
        \Milestone\Appframe\Resource::truncate()
            ->create([	'name' => 'User',	'description' => 'All the users of this app',	'title' => 'Users',	'namespace' => 'Milestone\Appframe',	'table' => 'users',	'key' => 'id',										])
            ->create([	'name' => 'Group',	'description' => 'Groups for users. Every user belongs to any or multiple groups',	'title' => 'Groups',	'namespace' => 'Milestone\Appframe',	'table' => '__groups',	'key' => 'id',										])
            ->create([	'name' => 'Role',	'description' => 'Roles defines which resources should a group have access',	'title' => 'Roles',	'namespace' => 'Milestone\Appframe',	'table' => '__roles',	'key' => 'id',										])
            ->create([	'name' => 'Resource',	'description' => 'Each part of this module',	'title' => 'Resource',	'namespace' => 'Milestone\Appframe',	'table' => '__resources',	'key' => 'id',										])
            ->create([	'name' => 'Organisation',	'description' => 'Details of the organisation',	'title' => 'Organisation',	'namespace' => 'Milestone\Appframe',	'table' => '__organisation',	'key' => 'id',										])
            ->create([	'name' => 'OrganisationContact',	'description' => 'Contact details of organisation',	'title' => 'Contacts',	'namespace' => 'Milestone\Appframe',	'table' => '__organisation_contacts',	'key' => 'id',										])
            ->create([	'name' => 'ResourceAction',	'description' => 'Actions applicable for the resource',	'title' => 'Resource Actions',	'namespace' => 'Milestone\Appframe',	'table' => '__resource_actions',	'key' => 'id',										])
            ->create([	'name' => 'ResourceActionMethod',	'description' => 'The methods to be handled for resource action',	'title' => 'Resource Action Methods',	'namespace' => 'Milestone\Appframe',	'table' => '__resource_action_methods',	'key' => 'id',										])
            ->create([	'name' => 'ResourceActionList',	'description' => 'The lists where an action should belongs',	'title' => 'Resource Action Lists',	'namespace' => 'Milestone\Appframe',	'table' => '__resource_action_lists',	'key' => 'id',										])
            ->create([	'name' => 'ResourceActionData',	'description' => 'The resource show, where an action should belongs',	'title' => 'Resource Action Data',	'namespace' => 'Milestone\Appframe',	'table' => '__resource_action_data',	'key' => 'id',										])
            ->create([	'name' => 'ResourceRole',	'description' => 'The resources assigned to a role',	'title' => 'Role Resources',	'namespace' => 'Milestone\Appframe',	'table' => '__resource_roles',	'key' => 'id',										])
            ->create([	'name' => 'ResourceForm',	'description' => 'Forms associated with a resource',	'title' => 'Forms',	'namespace' => 'Milestone\Appframe',	'table' => '__resource_forms',	'key' => 'id',										])
            ->create([	'name' => 'ResourceFormField',	'description' => 'Field details for a form',	'title' => 'Form Fields',	'namespace' => 'Milestone\Appframe',	'table' => '__resource_form_fields',	'key' => 'id',										])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
