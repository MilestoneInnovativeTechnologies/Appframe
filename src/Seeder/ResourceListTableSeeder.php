<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceListTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceList::truncate()
            ->create([	'id' => '1', 	'resource' => '1', 	'name' => 'UsersList', 	'description' => 'List all users', 	'title' => 'Users', 	'items_per_page' => '25', 										])
            ->create([	'id' => '2', 	'resource' => '4', 	'name' => 'ResourcesList', 	'description' => 'List all resources', 	'title' => 'Resources', 	'items_per_page' => '100', 										])
            ->create([	'id' => '3', 	'resource' => '30', 	'name' => 'ActionsList', 	'description' => 'List all actions', 	'title' => 'Actions', 	'items_per_page' => '100', 										])
            ->create([	'id' => '4', 	'resource' => '8', 	'name' => 'FormsList', 	'description' => 'List all forms', 	'title' => 'Forms', 	'items_per_page' => '100', 										])
            ->create([	'id' => '5', 	'resource' => '20', 	'name' => 'ListsList', 	'description' => 'List all lists', 	'title' => 'Lists', 	'items_per_page' => '100', 										])
            ->create([	'id' => '6', 	'resource' => '25', 	'name' => 'DataList', 	'description' => 'List all data', 	'title' => 'Data', 	'items_per_page' => '100', 										])
            ->create([	'id' => '7', 	'resource' => '9', 	'name' => 'FieldsList', 	'description' => 'List all fields', 	'title' => 'Fields', 	'items_per_page' => '20', 										])
            ->create([	'id' => '8', 	'resource' => '16', 	'name' => 'FormLayout', 	'description' => 'List all layout details of a form', 	'title' => 'Form Layout', 	'items_per_page' => '20', 										])
            ->create([	'id' => '9', 	'resource' => '17', 	'name' => 'FormCollections', 	'description' => 'List all collection forms of a form', 	'title' => 'Form Colletion', 	'items_per_page' => '5', 										])
            ->create([	'id' => '10', 	'resource' => '21', 	'name' => 'ListRelations', 	'description' => 'List all relations of a list', 	'title' => 'List Relations', 	'items_per_page' => '10', 										])
            ->create([	'id' => '11', 	'resource' => '22', 	'name' => 'ListScopes', 	'description' => 'List all scopes of a list', 	'title' => 'List Scopes', 	'items_per_page' => '10', 										])
            ->create([	'id' => '12', 	'resource' => '23', 	'name' => 'ListLayout', 	'description' => 'List layout details of a list', 	'title' => 'List Layout', 	'items_per_page' => '20', 										])
            ->create([	'id' => '13', 	'resource' => '24', 	'name' => 'ListSearchFields', 	'description' => 'Searchable fields of a list', 	'title' => 'List Searchable Fields', 	'items_per_page' => '20', 										])
            ->create([	'id' => '14', 	'resource' => '26', 	'name' => 'DataRelations', 	'description' => 'List all relations of a data', 	'title' => 'Data Relations', 	'items_per_page' => '20', 										])
            ->create([	'id' => '15', 	'resource' => '27', 	'name' => 'DataScopes', 	'description' => 'List all scopes of a data', 	'title' => 'Data Scopes', 	'items_per_page' => '20', 										])
            ->create([	'id' => '16', 	'resource' => '28', 	'name' => 'DataSections', 	'description' => 'List all sections of a data', 	'title' => 'Data Sections', 	'items_per_page' => '20', 										])
            ->create([	'id' => '17', 	'resource' => '32', 	'name' => 'ActionAttrs', 	'description' => 'List all action attributes', 	'title' => 'Action Attributes', 	'items_per_page' => '20', 										])
            ->create([	'id' => '18', 	'resource' => '11', 	'name' => 'FieldAttrsList', 	'description' => 'List all field attributes', 	'title' => 'Field Attributes', 	'items_per_page' => '30', 										])
            ->create([	'id' => '19', 	'resource' => '12', 	'name' => 'FieldOptionsList', 	'description' => 'List all field options', 	'title' => 'Field Options', 	'items_per_page' => '5', 										])
            ->create([	'id' => '20', 	'resource' => '13', 	'name' => 'FieldValidationsList', 	'description' => 'List all field validations', 	'title' => 'Field Validations', 	'items_per_page' => '10', 										])
            ->create([	'id' => '21', 	'resource' => '14', 	'name' => 'FieldDependsList', 	'description' => 'List all field dependents', 	'title' => 'Field Depends', 	'items_per_page' => '5', 										])
            ->create([	'id' => '22', 	'resource' => '15', 	'name' => 'FieldDynamicsList', 	'description' => 'List all field dynamics', 	'title' => 'Field Dynamics', 	'items_per_page' => '5', 										])
            ->create([	'id' => '23', 	'resource' => '2', 	'name' => 'GroupsList', 	'description' => 'List all groups', 	'title' => 'Groups', 	'items_per_page' => '20', 										])
            ->create([	'id' => '24', 	'resource' => '3', 	'name' => 'RolesList', 	'description' => 'List all roles', 	'title' => 'Roles', 	'items_per_page' => '20', 										])
            ->create([	'id' => '25', 	'resource' => '5', 	'name' => 'RoleResourcesList', 	'description' => 'List all resources of a role', 	'title' => 'Resources', 	'items_per_page' => '30', 										])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
