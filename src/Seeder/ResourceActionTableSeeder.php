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
        \Milestone\Appframe\Model\ResourceAction::truncate()
            ->create([	'resource' => '1', 	'name' => 'CreateUser', 	'description' => 'Create a new user', 	'title' => 'Create a new user', 	'type' => 'outline-info', 	'menu' => 'New User', 	'icon' => 'user-plus', 	'set' => 'fas', 								])
            ->create([	'resource' => '1', 	'name' => 'CreateAdministrator', 	'description' => 'Create a new Administrator User', 	'title' => 'New Administrator', 	'type' => 'outline-info', 	'menu' => 'New Administrator', 	'icon' => 'user-graduate', 	'set' => 'fas', 								])
            ->create([	'resource' => '1', 	'name' => 'CreateDeveloper', 	'description' => 'Create a new Developer User', 	'title' => 'New Developer', 	'type' => 'outline-info', 	'menu' => 'New Developer', 	'icon' => 'user-cog', 	'set' => 'fas', 								])
            ->create([	'resource' => '1', 	'name' => 'AllUsersList', 	'description' => 'List All Users', 	'title' => 'Users', 	'type' => 'outline-info', 	'menu' => 'All Users', 	'icon' => 'users', 	'set' => 'fas', 								])
            ->create([	'resource' => '1', 	'name' => 'AllAdministratorsList', 	'description' => 'List All Administrators', 	'title' => 'Administrators', 	'type' => 'outline-info', 	'menu' => 'Administrators', 	'icon' => 'user-shield', 	'set' => 'fas', 								])
            ->create([	'resource' => '1', 	'name' => 'AllDevelopersList', 	'description' => 'List All Developers', 	'title' => 'Developers', 	'type' => 'outline-info', 	'menu' => 'Developers', 	'icon' => 'user-graduate', 	'set' => 'fas', 								])
            ->create([	'resource' => '1', 	'name' => 'ViewAdministrator', 	'description' => 'View details of administrators', 	'title' => 'View', 	'type' => 'outline-info', 		'icon' => 'user-check', 	'set' => 'fas', 								])
            ->create([	'resource' => '1', 	'name' => 'ViewDeveloper', 	'description' => 'View details of developer', 	'title' => 'View', 	'type' => 'outline-info', 		'icon' => 'user-check', 	'set' => 'fas', 								])
            ->create([	'resource' => '1', 	'name' => 'EditAdministrator', 	'description' => 'Edit details of a administrator', 	'title' => 'Edit', 	'type' => 'outline-info', 		'icon' => 'edit', 	'set' => 'fas', 								])
            ->create([	'resource' => '1', 	'name' => 'EditDeveloper', 	'description' => 'Edit details of a developer', 	'title' => 'Edit', 	'type' => 'outline-info', 		'icon' => 'edit', 	'set' => 'fas', 								])
            ->create([	'resource' => '4', 	'name' => 'NewResource', 	'description' => 'Create a resource', 	'title' => 'New Resource', 		'menu' => 'New Resource', 										])
            ->create([	'resource' => '7', 	'name' => 'NewAction', 	'description' => 'Create a resource action', 	'title' => 'New Resource Action', 		'menu' => 'New Resource Action', 										])
            ->create([	'resource' => '12', 	'name' => 'NewForm', 	'description' => 'Create a resource form', 	'title' => 'New Resource Form', 		'menu' => 'New Resource Form', 										])
            ->create([	'resource' => '13', 	'name' => 'NewFormField', 	'description' => 'Create a field for a form', 	'title' => 'New Form Field', 		'menu' => 'New Form Field', 										])
            ->create([	'resource' => '14', 	'name' => 'NewFieldAttribute', 	'description' => 'Add attributed to a field', 	'title' => 'New Field Attribute', 		'menu' => 'New Field Attribute', 										])
            ->create([	'resource' => '15', 	'name' => 'NewFieldOption', 	'description' => 'Create options for a field', 	'title' => 'New Field Options', 		'menu' => 'New Field Options', 										])
            ->create([	'resource' => '16', 	'name' => 'NewFieldValidation', 	'description' => 'Add validation rules for a field', 	'title' => 'New Validation', 		'menu' => 'New Validation', 										])
            ->create([	'resource' => '19', 	'name' => 'NewResourceList', 	'description' => 'Add a list for a resource', 	'title' => 'New Resource List', 		'menu' => 'New Resource List', 										])
            ->create([	'resource' => '21', 	'name' => 'NewResourceScopes', 	'description' => 'Create scopes for a resource', 	'title' => 'New Resource Scope', 		'menu' => 'New Resource Scope', 										])
            ->create([	'resource' => '23', 	'name' => 'NewResourceData', 	'description' => 'Create a data view for a resource', 	'title' => 'New Resource Data', 		'menu' => 'New Resource Data', 										])
            ->create([	'resource' => '25', 	'name' => 'NewListLayout', 	'description' => 'Create layout for a list', 	'title' => 'New List Layout', 		'menu' => 'New List Layout', 										])
            ->create([	'resource' => '26', 	'name' => 'NewResourceRelation', 	'description' => 'Add a relation of a resource', 	'title' => 'New Resource Relation', 		'menu' => 'New Resource Relation', 										])
            ->create([	'resource' => '28', 	'name' => 'NewDataViewSection', 	'description' => 'Add a section to a data view', 	'title' => 'New Data View Section', 		'menu' => 'New Data View Section', 										])
            ->create([	'resource' => '29', 	'name' => 'NewDataViewSectionItem', 	'description' => 'Add an item to a data view section', 	'title' => 'New Data View Section Item', 		'menu' => 'New Data View Section Item', 										])
            ->create([	'resource' => '30', 	'name' => 'AddFormCollection', 	'description' => 'Make a form to collection form', 	'title' => 'New Collection Form', 		'menu' => 'New Collection Form', 										])
            ->create([	'resource' => '31', 	'name' => 'AddListSearch', 	'description' => 'Add searchable fields for a list', 	'title' => 'New Search Fields', 		'menu' => 'New Search Fields', 										])
            ->create([	'resource' => '32', 	'name' => 'CreateFormDependent', 	'description' => 'Add details of a field whose value depends on another fields value', 	'title' => 'New Dependent Fields', 		'menu' => 'New Dependent Fields', 										])
            ->create([	'resource' => '33', 	'name' => 'CreateDashboard', 	'description' => 'Create a resource dashboard', 	'title' => 'New Resource Dashboard', 		'menu' => 'New Resource Dashboard', 										])
            ->create([	'resource' => '34', 	'name' => 'CreateDashboardSection', 	'description' => 'Add a section to a dashboard', 	'title' => 'New Dashboard Section', 		'menu' => 'New Dashboard Section', 										])
            ->create([	'resource' => '35', 	'name' => 'AddDashboardSectionItem', 	'description' => 'Add an item to a dashboard section', 	'title' => 'New Dashboard Section Item', 		'menu' => 'New Dashboard Section Item', 										])
            ->create([	'resource' => '36', 	'name' => 'CreateResourceMetrics', 	'description' => 'Setup a metric for a resource', 	'title' => 'New Resource Metric', 		'menu' => 'New Resource Metric', 										])
            ->create([	'resource' => '37', 	'name' => 'AddDynamicField', 	'description' => 'Alter a fields nature depending upon another field', 	'title' => 'New Dynamic Field', 		'menu' => 'New Dynamic Field', 										])
            ->create([	'resource' => '20', 	'name' => 'NewListRelation', 	'description' => 'Add relations to be loaded for a list', 	'title' => 'New List Relation', 		'menu' => 'New List Relation', 										])
            ->create([	'resource' => '24', 	'name' => 'NewDataRelation', 	'description' => 'Add relations to be loaded for a data view', 	'title' => 'New Data Relation', 		'menu' => 'New Data Relation', 										])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
