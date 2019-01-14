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
            ->create([	'id' => '1', 	'name' => 'User', 	'description' => 'All the users of this app', 	'title' => 'Users', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => 'users', 			'development' => 'Yes', 							])
            ->create([	'id' => '2', 	'name' => 'Group', 	'description' => 'Groups for users. Every user belongs to any or multiple groups', 	'title' => 'Groups', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__groups', 			'development' => 'Yes', 							])
            ->create([	'id' => '3', 	'name' => 'Role', 	'description' => 'Roles defines which resources should a group have access', 	'title' => 'Roles', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__roles', 			'development' => 'Yes', 							])
            ->create([	'id' => '4', 	'name' => 'Resource', 	'description' => 'Each part of this module', 	'title' => 'Resource', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resources', 			'development' => 'Yes', 							])
            ->create([	'id' => '5', 	'name' => 'ResourceRole', 	'description' => 'The resources assigned to a role', 	'title' => 'Role Resources', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_roles', 			'development' => 'Yes', 							])
            ->create([	'id' => '6', 	'name' => 'ResourceRelation', 	'description' => 'Relation details of a resource', 	'title' => 'Resource Relations', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_relations', 			'development' => 'Yes', 							])
            ->create([	'id' => '7', 	'name' => 'ResourceScope', 	'description' => 'Scopes available on a resource', 	'title' => 'Resource Scopes', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_scopes', 			'development' => 'Yes', 							])
            ->create([	'id' => '8', 	'name' => 'ResourceForm', 	'description' => 'Forms associated with a resource', 	'title' => 'Forms', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_forms', 			'development' => 'Yes', 							])
            ->create([	'id' => '9', 	'name' => 'ResourceFormField', 	'description' => 'Field details for a form', 	'title' => 'Form Fields', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_form_fields', 			'development' => 'Yes', 							])
            ->create([	'id' => '10', 	'name' => 'ResourceFormFieldData', 	'description' => 'Database bindings of a form field', 	'title' => 'Field Data', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_form_field_data', 			'development' => 'Yes', 							])
            ->create([	'id' => '11', 	'name' => 'ResourceFormFieldAttr', 	'description' => 'Additional attributes of a field', 	'title' => 'Field Attributes', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_form_field_attrs', 			'development' => 'Yes', 							])
            ->create([	'id' => '12', 	'name' => 'ResourceFormFieldOption', 	'description' => 'Options for form fields', 	'title' => 'Field Options', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_form_field_options', 			'development' => 'Yes', 							])
            ->create([	'id' => '13', 	'name' => 'ResourceFormFieldValidation', 	'description' => 'Validation details of the field', 	'title' => 'Field Validation', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_form_field_validations', 			'development' => 'Yes', 							])
            ->create([	'id' => '14', 	'name' => 'ResourceFormFieldDepend', 	'description' => 'Dependent fields in a form', 	'title' => 'Dependent Fields', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_form_field_depends', 	'controller' => 'ResourceFormFieldDependController', 	'controller_namespace' => 'Milestone\Appframe\Controllers', 	'development' => 'Yes', 							])
            ->create([	'id' => '15', 	'name' => 'ResourceFormFieldDynamic', 	'description' => 'Dynamic field details', 	'title' => 'Dynamic Field', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_form_field_dynamic', 			'development' => 'Yes', 							])
            ->create([	'id' => '16', 	'name' => 'ResourceFormLayout', 	'description' => 'Form field layout details', 	'title' => 'Form Layout', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_form_layout', 			'development' => 'Yes', 							])
            ->create([	'id' => '17', 	'name' => 'ResourceFormCollection', 	'description' => 'Collection/Detail Form', 	'title' => 'Collection Form', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_form_collection', 			'development' => 'Yes', 							])
            ->create([	'id' => '18', 	'name' => 'ResourceFormUpload', 	'description' => 'Upload file details', 	'title' => 'Form Upload', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_form_upload', 			'development' => 'Yes', 							])
            ->create([	'id' => '19', 	'name' => 'ResourceFormDefault', 	'description' => 'Predefined field values for a form', 	'title' => 'Form Defaults', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_form_defaults', 			'development' => 'Yes', 							])
            ->create([	'id' => '20', 	'name' => 'ResourceList', 	'description' => 'List of data', 	'title' => 'Lists', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_lists', 			'development' => 'Yes', 							])
            ->create([	'id' => '21', 	'name' => 'ResourceListRelation', 	'description' => 'Relations to be loaded on accessing list', 	'title' => 'List Relations', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_list_relations', 			'development' => 'Yes', 							])
            ->create([	'id' => '22', 	'name' => 'ResourceListScope', 	'description' => 'Scope to be applied on list', 	'title' => 'List Scopes', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_list_scopes', 			'development' => 'Yes', 							])
            ->create([	'id' => '23', 	'name' => 'ResourceListLayout', 	'description' => 'Layout of a list', 	'title' => 'List Layout', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_list_layout', 			'development' => 'Yes', 							])
            ->create([	'id' => '24', 	'name' => 'ResourceListSearch', 	'description' => 'Searchable fields in a list', 	'title' => 'List Search', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_list_search', 			'development' => 'Yes', 							])
            ->create([	'id' => '25', 	'name' => 'ResourceData', 	'description' => 'A particular record from database', 	'title' => 'Data', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_data', 			'development' => 'Yes', 							])
            ->create([	'id' => '26', 	'name' => 'ResourceDataRelation', 	'description' => 'The relations to be loaded from resource data', 	'title' => 'Data Relations', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_data_relations', 			'development' => 'Yes', 							])
            ->create([	'id' => '27', 	'name' => 'ResourceDataScope', 	'description' => 'Scope to be applied on a detail', 	'title' => 'Data Scopes', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_data_relations', 			'development' => 'Yes', 							])
            ->create([	'id' => '28', 	'name' => 'ResourceDataViewSection', 	'description' => 'Sections of a data view', 	'title' => 'Data View Section', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_data_view_sections', 			'development' => 'Yes', 							])
            ->create([	'id' => '29', 	'name' => 'ResourceDataViewSectionItem', 	'description' => 'Items of a data view section', 	'title' => 'Data View Section Items', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_data_view_section_items', 			'development' => 'Yes', 							])
            ->create([	'id' => '30', 	'name' => 'ResourceAction', 	'description' => 'Actions applicable for the resource', 	'title' => 'Actions', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_actions', 	'controller' => 'ResourceActionController', 	'controller_namespace' => 'Milestone\Appframe\Controllers', 	'development' => 'Yes', 							])
            ->create([	'id' => '31', 	'name' => 'ResourceActionMethod', 	'description' => 'The methods to be handled for resource action', 	'title' => 'Resource Action Methods', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_action_methods', 			'development' => 'Yes', 							])
            ->create([	'id' => '32', 	'name' => 'ResourceActionAttr', 	'description' => 'Resource action icon attrs', 	'title' => 'Resource Action Attrs', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_action_attrs', 			'development' => 'Yes', 							])
            ->create([	'id' => '33', 	'name' => 'ResourceActionList', 	'description' => 'The lists where an action should belongs', 	'title' => 'Resource Action Lists', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_action_lists', 			'development' => 'Yes', 							])
            ->create([	'id' => '34', 	'name' => 'ResourceActionData', 	'description' => 'The resource show, where an action should belongs', 	'title' => 'Resource Action Data', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_action_data', 			'development' => 'Yes', 							])
            ->create([	'id' => '35', 	'name' => 'ResourceDefault', 	'description' => 'Resources default Form, List and Data', 	'title' => 'Resource Default', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_defaults', 			'development' => 'Yes', 							])
            ->create([	'id' => '36', 	'name' => 'ResourceMetric', 	'description' => 'Metrics defined for a resource', 	'title' => 'Resource Metrics', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_metrics', 			'development' => 'Yes', 							])
            ->create([	'id' => '37', 	'name' => 'ResourceDashboard', 	'description' => 'Dashboard details for a Resource', 	'title' => 'Resource Dashboard', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_dashboard', 			'development' => 'Yes', 							])
            ->create([	'id' => '38', 	'name' => 'ResourceDashboardSection', 	'description' => 'Sections of a Dashboard', 	'title' => 'Dashboard Section', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_dashboard_sections', 			'development' => 'Yes', 							])
            ->create([	'id' => '39', 	'name' => 'ResourceDashboardSectionItem', 	'description' => 'Items of a Dashboard Section', 	'title' => 'Dashboard Section Items', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__resource_dashboard_section_items', 			'development' => 'Yes', 							])
            ->create([	'id' => '40', 	'name' => 'Organisation', 	'description' => 'Details of the organisation', 	'title' => 'Organisation', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__organisation', 			'development' => 'Yes', 							])
            ->create([	'id' => '41', 	'name' => 'OrganisationContact', 	'description' => 'Contact details of organisation', 	'title' => 'Contacts', 	'namespace' => 'Milestone\Appframe\Model', 	'table' => '__organisation_contacts', 			'development' => 'Yes', 							])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
