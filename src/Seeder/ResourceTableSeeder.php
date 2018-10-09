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
        \Milestone\Appframe\Model\Resource::truncate()
            ->create([	'name' => 'User', 	'description' => 'All the users of this app', 	'title' => 'Users', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => 'users', 	'key' => 'id', 										])
            ->create([	'name' => 'Group', 	'description' => 'Groups for users. Every user belongs to any or multiple groups', 	'title' => 'Groups', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__groups', 	'key' => 'id', 										])
            ->create([	'name' => 'Role', 	'description' => 'Roles defines which resources should a group have access', 	'title' => 'Roles', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__roles', 	'key' => 'id', 										])
            ->create([	'name' => 'Resource', 	'description' => 'Each part of this module', 	'title' => 'Resource', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resources', 	'key' => 'id', 										])
            ->create([	'name' => 'Organisation', 	'description' => 'Details of the organisation', 	'title' => 'Organisation', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__organisation', 	'key' => 'id', 										])
            ->create([	'name' => 'OrganisationContact', 	'description' => 'Contact details of organisation', 	'title' => 'Contacts', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__organisation_contacts', 	'key' => 'id', 										])
            ->create([	'name' => 'ResourceAction', 	'description' => 'Actions applicable for the resource', 	'title' => 'Resource Actions', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_actions', 	'key' => 'id', 										])
            ->create([	'name' => 'ResourceActionMethod', 	'description' => 'The methods to be handled for resource action', 	'title' => 'Resource Action Methods', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_action_methods', 	'key' => 'id', 										])
            ->create([	'name' => 'ResourceActionList', 	'description' => 'The lists where an action should belongs', 	'title' => 'Resource Action Lists', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_action_lists', 	'key' => 'id', 										])
            ->create([	'name' => 'ResourceActionData', 	'description' => 'The resource show, where an action should belongs', 	'title' => 'Resource Action Data', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_action_data', 	'key' => 'id', 										])
            ->create([	'name' => 'ResourceRole', 	'description' => 'The resources assigned to a role', 	'title' => 'Role Resources', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_roles', 	'key' => 'id', 										])
            ->create([	'name' => 'ResourceForm', 	'description' => 'Forms associated with a resource', 	'title' => 'Forms', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_forms', 	'key' => 'id', 										])
            ->create([	'name' => 'ResourceFormField', 	'description' => 'Field details for a form', 	'title' => 'Form Fields', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_form_fields', 	'key' => 'id', 										])
            ->create([	'name' => 'ResourceFormFieldAttr', 	'description' => 'Additional attributes of a field', 	'title' => 'Field Attributes', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_form_field_attrs', 	'key' => 'id', 										])
            ->create([	'name' => 'ResourceFormFieldOption', 	'description' => 'Options for form fields', 	'title' => 'Field Options', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_form_field_options', 	'key' => 'id', 										])
            ->create([	'name' => 'ResourceFormFieldValidation', 	'description' => 'Validation details of the field', 	'title' => 'Field Validation', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_form_field_validations', 	'key' => 'id', 										])
            ->create([	'name' => 'ResourceFormDefault', 	'description' => 'Predefined field values for a form', 	'title' => 'Form Defaults', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_form_defaults', 	'key' => 'id', 										])
            ->create([	'name' => 'ResourceFormFieldData', 	'description' => 'Database bindings of a form field', 	'title' => 'Field Data', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_form_field_data', 	'key' => 'id', 										])
            ->create([	'name' => 'ResourceList', 	'description' => 'List of data', 	'title' => 'Lists', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_lists', 	'key' => 'id', 										])
            ->create([	'name' => 'ResourceListRelation', 	'description' => 'Relations to be loaded on accessing list', 	'title' => 'List Relations', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_list_relations', 	'key' => 'id', 										])
            ->create([	'name' => 'ResourceScope', 	'description' => 'Scope to be applied on resource', 	'title' => 'Resource Scopes', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_scopes', 	'key' => 'id', 										])
            ->create([	'name' => 'ResourceListScope', 	'description' => 'Scope to be applied on list', 	'title' => 'List Scopes', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_list_scopes', 	'key' => 'id', 										])
            ->create([	'name' => 'ResourceData', 	'description' => 'A particular record from database', 	'title' => 'Data', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_data', 	'key' => 'id', 										])
            ->create([	'name' => 'ResourceDataRelation', 	'description' => 'The relations to be loaded from resource data', 	'title' => 'Data Relations', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_data_relations', 	'key' => 'id', 										])
            ->create([	'name' => 'ResourceListLayout', 	'description' => 'Layout of a list', 	'title' => 'List Layout', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_list_layout', 	'key' => 'id', 										])
            ->create([	'name' => 'ResourceRelation', 	'description' => 'Relation details of a resource', 	'title' => 'Resource Relations', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_relations', 	'key' => 'id', 										])
            ->create([	'name' => 'ResourceFormLayout', 	'description' => 'Form field layout details', 	'title' => 'Form Layout', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_form_layout', 	'key' => 'id', 										])
            ->create([	'name' => 'ResourceDataViewSection', 	'description' => 'Sections of a data view', 	'title' => 'Data View Section', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_data_view_sections', 	'key' => 'id', 										])
            ->create([	'name' => 'ResourceDataViewSectionItem', 	'description' => 'Items of a data view section', 	'title' => 'Data View Section Items', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_data_view_section_items', 	'key' => 'id', 										])
            ->create([	'name' => 'ResourceFormCollection', 	'description' => 'Collection/Detail Form', 	'title' => 'Collection Form', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_form_collection', 	'key' => 'id', 										])
            ->create([	'name' => 'ResourceListSearch', 	'description' => 'Searchable fields in a list', 	'title' => 'List Search', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_list_search', 	'key' => 'id', 										])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
