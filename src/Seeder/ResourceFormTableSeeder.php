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
            ->create([	'resource' => '4', 	'name' => 'NewResource', 	'description' => 'Create a resource', 	'title' => 'New Resource', 	'action_text' => 'Create Resource', 											])
            ->create([	'resource' => '7', 	'name' => 'NewAction', 	'description' => 'Create a resource action', 	'title' => 'New Resource Action', 	'action_text' => 'Create Action', 											])
            ->create([	'resource' => '12', 	'name' => 'NewForm', 	'description' => 'Create a resource form', 	'title' => 'New Form', 	'action_text' => 'Create Form', 											])
            ->create([	'resource' => '13', 	'name' => 'NewFormField', 	'description' => 'Create a field for a form', 	'title' => 'New Form Field', 	'action_text' => 'Add Field', 											])
            ->create([	'resource' => '14', 	'name' => 'NewFieldAttribute', 	'description' => 'Add attributed to a field', 	'title' => 'New Field Attribute', 	'action_text' => 'Add Attribute', 											])
            ->create([	'resource' => '15', 	'name' => 'NewFieldOption', 	'description' => 'Create options for a field', 	'title' => 'New Field Options', 	'action_text' => 'Setup Option', 											])
            ->create([	'resource' => '16', 	'name' => 'NewFieldValidation', 	'description' => 'Add validation rules for a field', 	'title' => 'New Validation', 	'action_text' => 'Add Validation', 											])
            ->create([	'resource' => '19', 	'name' => 'NewResourceList', 	'description' => 'Add a list for a resource', 	'title' => 'New Resource List', 	'action_text' => 'Create List', 											])
            ->create([	'resource' => '21', 	'name' => 'NewResourceScopes', 	'description' => 'Create scopes for a resource', 	'title' => 'New Resource Scope', 	'action_text' => 'Create Scope', 											])
            ->create([	'resource' => '23', 	'name' => 'NewResourceData', 	'description' => 'Create a data view for a resource', 	'title' => 'New Resource Data', 	'action_text' => 'Create Data View', 											])
            ->create([	'resource' => '25', 	'name' => 'NewListLayout', 	'description' => 'Create layout for a list', 	'title' => 'New List Layout', 	'action_text' => 'Add Layout', 											])
            ->create([	'resource' => '26', 	'name' => 'NewResourceRelation', 	'description' => 'Add a relation of a resource', 	'title' => 'New Resource Relation', 	'action_text' => 'Add Relation', 											])
            ->create([	'resource' => '28', 	'name' => 'NewDataViewSection', 	'description' => 'Add a section to a data view', 	'title' => 'New Data View Section', 	'action_text' => 'Add Data View Section', 											])
            ->create([	'resource' => '29', 	'name' => 'NewDataViewSectionItem', 	'description' => 'Add an item to a data view section', 	'title' => 'New Data View Section Item', 	'action_text' => 'Add Data View Section Item', 											])
            ->create([	'resource' => '30', 	'name' => 'AddFormCollection', 	'description' => 'Make a form to collection form', 	'title' => 'New Collection Form', 	'action_text' => 'Add Details', 											])
            ->create([	'resource' => '31', 	'name' => 'AddListSearch', 	'description' => 'Add searchable fields for a list', 	'title' => 'New Search Fields', 	'action_text' => 'Add Field', 											])
            ->create([	'resource' => '32', 	'name' => 'CreateFormDependent', 	'description' => 'Add details of a field whose value depends on another fields value', 	'title' => 'New Dependent Fields', 	'action_text' => 'Add Dependent Details', 											])
            ->create([	'resource' => '33', 	'name' => 'CreateDashboard', 	'description' => 'Create a resource dashboard', 	'title' => 'New Resource Dashboard', 	'action_text' => 'Create Dashboard', 											])
            ->create([	'resource' => '34', 	'name' => 'CreateDashboardSection', 	'description' => 'Add a section to a dashboard', 	'title' => 'New Dashboard Section', 	'action_text' => 'Add Section', 											])
            ->create([	'resource' => '35', 	'name' => 'AddDashboardSectionItem', 	'description' => 'Add an item to a dashboard section', 	'title' => 'New Dashboard Section Item', 	'action_text' => 'Add Item', 											])
            ->create([	'resource' => '36', 	'name' => 'CreateResourceMetrics', 	'description' => 'Setup a metric for a resource', 	'title' => 'New Resource Metric', 	'action_text' => 'Add Metric', 											])
            ->create([	'resource' => '37', 	'name' => 'AddDynamicField', 	'description' => 'Alter a fields nature depending upon another field', 	'title' => 'New Dynamic Field', 	'action_text' => 'Add Dynamic Details', 											])
            ->create([	'resource' => '20', 	'name' => 'NewListRelation', 	'description' => 'Add relations to be loaded for a list', 	'title' => 'New List Relation', 	'action_text' => 'Add Relation', 											])
            ->create([	'resource' => '24', 	'name' => 'NewDataRelation', 	'description' => 'Add relations to be loaded for a data view', 	'title' => 'New Data Relation', 	'action_text' => 'Add Relation', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
