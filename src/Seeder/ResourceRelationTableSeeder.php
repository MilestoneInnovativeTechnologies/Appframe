<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceRelationTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceRelation::truncate()
            ->create([	'id' => '1', 	'resource' => '1', 	'name' => 'User Groups', 	'description' => 'Which groups this user belongs to', 	'method' => 'Groups', 	'type' => 'belongsToMany', 	'relate_resource' => '2', 									])
            ->create([	'id' => '2', 	'resource' => '2', 	'name' => 'Group Users', 	'description' => 'List of users belongs to this group', 	'method' => 'Users', 	'type' => 'belongsToMany', 	'relate_resource' => '1', 									])
            ->create([	'id' => '3', 	'resource' => '2', 	'name' => 'Group Roles', 	'description' => 'Roles assigneed to this group', 	'method' => 'Roles', 	'type' => 'belongsToMany', 	'relate_resource' => '3', 									])
            ->create([	'id' => '4', 	'resource' => '3', 	'name' => 'Role Groups', 	'description' => 'Details of groups this role assigned to', 	'method' => 'Groups', 	'type' => 'belongsToMany', 	'relate_resource' => '2', 									])
            ->create([	'id' => '5', 	'resource' => '3', 	'name' => 'Role Resource', 	'description' => 'Resources assigned to a role', 	'method' => 'Resources', 	'type' => 'hasMany', 	'relate_resource' => '5', 									])
            ->create([	'id' => '6', 	'resource' => '4', 	'name' => 'Resource Roles', 	'description' => 'The details of roles who have access to this resource', 	'method' => 'Roles', 	'type' => 'belongsToMany', 	'relate_resource' => '3', 									])
            ->create([	'id' => '7', 	'resource' => '4', 	'name' => 'Resource Actions', 	'description' => 'Get actions available for the resource', 	'method' => 'Actions', 	'type' => 'hasMany', 	'relate_resource' => '30', 									])
            ->create([	'id' => '8', 	'resource' => '30', 	'name' => 'Resource Action Methods', 	'description' => 'Handler details of an action', 	'method' => 'Method', 	'type' => 'hasOne', 	'relate_resource' => '31', 									])
            ->create([	'id' => '9', 	'resource' => '30', 	'name' => 'Resource Action Lists', 	'description' => 'Lists where action available', 	'method' => 'Lists', 	'type' => 'hasMany', 	'relate_resource' => '33', 									])
            ->create([	'id' => '10', 	'resource' => '30', 	'name' => 'Resource Action Data', 	'description' => 'Resource data where action available', 	'method' => 'Data', 	'type' => 'hasMany', 	'relate_resource' => '34', 									])
            ->create([	'id' => '11', 	'resource' => '30', 	'name' => 'Resource Action Resource', 	'description' => 'Resoure details of a action', 	'method' => 'Resource', 	'type' => 'belongsTo', 	'relate_resource' => '4', 									])
            ->create([	'id' => '12', 	'resource' => '40', 	'name' => 'Organisation Contacts', 	'description' => 'Contact details of organisation', 	'method' => 'Contacts', 	'type' => 'hasMany', 	'relate_resource' => '41', 									])
            ->create([	'id' => '13', 	'resource' => '5', 	'name' => 'Resource Details', 	'description' => 'Resource details', 	'method' => 'Resource', 	'type' => 'belongsTo', 	'relate_resource' => '4', 									])
            ->create([	'id' => '14', 	'resource' => '4', 	'name' => 'Resource Forms', 	'description' => 'Forms available for a resource', 	'method' => 'Forms', 	'type' => 'hasMany', 	'relate_resource' => '8', 									])
            ->create([	'id' => '15', 	'resource' => '8', 	'name' => 'Form Fields', 	'description' => 'Fields associated with a form', 	'method' => 'Fields', 	'type' => 'hasMany', 	'relate_resource' => '9', 									])
            ->create([	'id' => '16', 	'resource' => '9', 	'name' => 'Field Attributes', 	'description' => 'Attributes of Field', 	'method' => 'Attributes', 	'type' => 'hasMany', 	'relate_resource' => '11', 									])
            ->create([	'id' => '17', 	'resource' => '9', 	'name' => 'Field Options', 	'description' => 'Options of Field', 	'method' => 'Options', 	'type' => 'hasMany', 	'relate_resource' => '12', 									])
            ->create([	'id' => '18', 	'resource' => '9', 	'name' => 'Field Validations', 	'description' => 'Validation details of field', 	'method' => 'Validations', 	'type' => 'hasMany', 	'relate_resource' => '13', 									])
            ->create([	'id' => '19', 	'resource' => '8', 	'name' => 'From Resource', 	'description' => 'Resource this form belongs to', 	'method' => 'Resource', 	'type' => 'belongsTo', 	'relate_resource' => '4', 									])
            ->create([	'id' => '20', 	'resource' => '8', 	'name' => 'Form Defaults', 	'description' => 'Predefined values for a form', 	'method' => 'Defaults', 	'type' => 'hasMany', 	'relate_resource' => '19', 									])
            ->create([	'id' => '21', 	'resource' => '9', 	'name' => 'Field Data', 	'description' => 'Fields Database binding details', 	'method' => 'Data', 	'type' => 'hasOne', 	'relate_resource' => '10', 									])
            ->create([	'id' => '22', 	'resource' => '4', 	'name' => 'Resource Relations', 	'description' => 'Relation of  a resource to another resource', 	'method' => 'Relations', 	'type' => 'hasMany', 	'relate_resource' => '6', 									])
            ->create([	'id' => '23', 	'resource' => '10', 	'name' => 'Bind Data Relation', 	'description' => 'Relation to which the data to be bind', 	'method' => 'Relation', 	'type' => 'belongsTo', 	'relate_resource' => '6', 									])
            ->create([	'id' => '24', 	'resource' => '19', 	'name' => 'Default Data Resource', 	'description' => 'Resource to which the forms predefined data to be bind', 	'method' => 'Relation', 	'type' => 'belongsTo', 	'relate_resource' => '4', 									])
            ->create([	'id' => '25', 	'resource' => '20', 	'name' => 'Resource Details', 	'description' => 'Resource details of a list', 	'method' => 'Resource', 	'type' => 'belongsTo', 	'relate_resource' => '4', 									])
            ->create([	'id' => '26', 	'resource' => '20', 	'name' => 'List Relations', 	'description' => 'Relations to be loaded on accessing list', 	'method' => 'Relations', 	'type' => 'hasMany', 	'relate_resource' => '21', 									])
            ->create([	'id' => '27', 	'resource' => '4', 	'name' => 'Resource Scopes', 	'description' => 'Scopes available on a Resource', 	'method' => 'Scopes', 	'type' => 'hasMany', 	'relate_resource' => '7', 									])
            ->create([	'id' => '28', 	'resource' => '20', 	'name' => 'List Scopes', 	'description' => 'Scopes by which a list to be filtered', 	'method' => 'Scopes', 	'type' => 'belongsToMany', 	'relate_resource' => '7', 									])
            ->create([	'id' => '29', 	'resource' => '25', 	'name' => 'Data Relation', 	'description' => 'Relations to be loaded on a data view', 	'method' => 'Relations', 	'type' => 'hasMany', 	'relate_resource' => '26', 									])
            ->create([	'id' => '30', 	'resource' => '25', 	'name' => 'Resource Details', 	'description' => 'Details of resource of a record', 	'method' => 'Resource', 	'type' => 'belongsTo', 	'relate_resource' => '4', 									])
            ->create([	'id' => '31', 	'resource' => '20', 	'name' => 'List Layout', 	'description' => 'Layout of a list', 	'method' => 'Layout', 	'type' => 'hasMany', 	'relate_resource' => '23', 									])
            ->create([	'id' => '32', 	'resource' => '6', 	'name' => 'Nested Relation', 	'description' => 'Nested Relation', 	'method' => 'Nest', 	'type' => 'hasMany', 	'relate_resource' => '6', 									])
            ->create([	'id' => '33', 	'resource' => '6', 	'name' => 'Related Resource', 	'description' => 'Related Resource Details', 	'method' => 'Relation', 	'type' => 'belongsTo', 	'relate_resource' => '4', 									])
            ->create([	'id' => '34', 	'resource' => '25', 	'name' => 'Data View Section', 	'description' => 'Section details of data view', 	'method' => 'Sections', 	'type' => 'hasMany', 	'relate_resource' => '28', 									])
            ->create([	'id' => '35', 	'resource' => '28', 	'name' => 'Data Relation', 	'description' => 'View relation of a data', 	'method' => 'Relation', 	'type' => 'belongsTo', 	'relate_resource' => '6', 									])
            ->create([	'id' => '36', 	'resource' => '29', 	'name' => 'Data item relation', 	'description' => 'View relation of a data item', 	'method' => 'Relation', 	'type' => 'belongsTo', 	'relate_resource' => '6', 									])
            ->create([	'id' => '37', 	'resource' => '6', 	'name' => 'Owner Relation', 	'description' => 'View the owner resource', 	'method' => 'Owner', 	'type' => 'belongsTo', 	'relate_resource' => '4', 									])
            ->create([	'id' => '38', 	'resource' => '8', 	'name' => 'Collections', 	'description' => 'Collection/Detail form', 	'method' => 'Collections', 	'type' => 'hasMany', 	'relate_resource' => '17', 									])
            ->create([	'id' => '39', 	'resource' => '17', 	'name' => 'Collection Form', 	'description' => 'Collection Form', 	'method' => 'Form', 	'type' => 'belongsTo', 	'relate_resource' => '8', 									])
            ->create([	'id' => '40', 	'resource' => '17', 	'name' => 'Relation', 	'description' => 'Details of Relation', 	'method' => 'Relation', 	'type' => 'belongsTo', 	'relate_resource' => '6', 									])
            ->create([	'id' => '41', 	'resource' => '12', 	'name' => 'Field', 	'description' => 'Field details', 	'method' => 'Field', 	'type' => 'belongsTo', 	'relate_resource' => '9', 									])
            ->create([	'id' => '42', 	'resource' => '9', 	'name' => 'Form', 	'description' => 'Form details', 	'method' => 'Form', 	'type' => 'belongsTo', 	'relate_resource' => '8', 									])
            ->create([	'id' => '43', 	'resource' => '20', 	'name' => 'List Search', 	'description' => 'Search fields for a list', 	'method' => 'Search', 	'type' => 'hasMany', 	'relate_resource' => '24', 									])
            ->create([	'id' => '44', 	'resource' => '9', 	'name' => 'Depending Fields', 	'description' => 'Dependent fields', 	'method' => 'Depends', 	'type' => 'hasMany', 	'relate_resource' => '14', 									])
            ->create([	'id' => '45', 	'resource' => '4', 	'name' => 'Resource Dashboards', 	'description' => 'Dashboards of a Resource', 	'method' => 'Dashboards', 	'type' => 'hasMany', 	'relate_resource' => '37', 									])
            ->create([	'id' => '46', 	'resource' => '37', 	'name' => 'Dashboard Sections', 	'description' => 'Sections of a dashboard', 	'method' => 'Sections', 	'type' => 'hasMany', 	'relate_resource' => '38', 									])
            ->create([	'id' => '47', 	'resource' => '38', 	'name' => 'Dashboard Section Items', 	'description' => 'Items of a dashboard section', 	'method' => 'Items', 	'type' => 'hasMany', 	'relate_resource' => '39', 									])
            ->create([	'id' => '48', 	'resource' => '37', 	'name' => 'Dashboard Resource', 	'description' => 'Resource details of a dashboard', 	'method' => 'Resource', 	'type' => 'belongsTo', 	'relate_resource' => '4', 									])
            ->create([	'id' => '49', 	'resource' => '9', 	'name' => 'Field Dynamics', 	'description' => 'Dynamic field details', 	'method' => 'Dynamics', 	'type' => 'belongsTo', 	'relate_resource' => '15', 									])
            ->create([	'id' => '50', 	'resource' => '25', 	'name' => 'Resource Data Scopes', 	'description' => 'Scopes applied on a data view', 	'method' => 'Scopes', 	'type' => 'belongsToMany', 	'relate_resource' => '7', 									])
            ->create([	'id' => '51', 	'resource' => '20', 	'name' => 'List Actions', 	'description' => 'Actions available for a list', 	'method' => 'Actions', 	'type' => 'belongsToMany', 	'relate_resource' => '30', 									])
            ->create([	'id' => '52', 	'resource' => '25', 	'name' => 'Data Actions', 	'description' => 'Actions available for a data view', 	'method' => 'Actions', 	'type' => 'belongsToMany', 	'relate_resource' => '30', 									])
            ->create([	'id' => '53', 	'resource' => '14', 	'name' => 'Dependent Field', 	'description' => 'Details of field to which this dependent record belongs to', 	'method' => 'Field', 	'type' => 'belongsTo', 	'relate_resource' => '9', 									])
            ->create([	'id' => '54', 	'resource' => '4', 	'name' => 'Resource Lists', 	'description' => 'Lists available for a Resources', 	'method' => 'Lists', 	'type' => 'hasMany', 	'relate_resource' => '20', 									])
            ->create([	'id' => '55', 	'resource' => '4', 	'name' => 'Resource Data', 	'description' => 'Data details avaliable for a Resource', 	'method' => 'Data', 	'type' => 'hasMany', 	'relate_resource' => '25', 									])
            ->create([	'id' => '56', 	'resource' => '8', 	'name' => 'Form Layout', 	'description' => 'Layout details of a form', 	'method' => 'Layout', 	'type' => 'hasMany', 	'relate_resource' => '16', 									])
            ->create([	'id' => '57', 	'resource' => '28', 	'name' => 'Section Items', 	'description' => 'Items of a data section', 	'method' => 'Items', 	'type' => 'hasMany', 	'relate_resource' => '29', 									])
            ->create([	'id' => '58', 	'resource' => '16', 	'name' => 'Layout Form', 	'description' => 'Form details of a layout', 	'method' => 'Form', 	'type' => 'belongsTo', 	'relate_resource' => '8', 									])
            ->create([	'id' => '59', 	'resource' => '16', 	'name' => 'Layout Field', 	'description' => 'Field details of  a layout', 	'method' => 'Field', 	'type' => 'belongsTo', 	'relate_resource' => '9', 									])
            ->create([	'id' => '60', 	'resource' => '17', 	'name' => 'Collection Foreign Field', 	'description' => 'Foreign field details of a from collection', 	'method' => 'Field', 	'type' => 'belongsTo', 	'relate_resource' => '9', 									])
            ->create([	'id' => '61', 	'resource' => '21', 	'name' => 'List Relation to List', 	'description' => 'List details of a list relation', 	'method' => 'List', 	'type' => 'belongsTo', 	'relate_resource' => '20', 									])
            ->create([	'id' => '62', 	'resource' => '21', 	'name' => 'List Relation to Relation', 	'description' => 'Relation details of a list relation', 	'method' => 'Relation', 	'type' => 'belongsTo', 	'relate_resource' => '6', 									])
            ->create([	'id' => '63', 	'resource' => '21', 	'name' => 'List Relation to Nest Relation', 	'description' => 'Level 1 deep relation of a list relation', 	'method' => 'NRelation', 	'type' => 'belongsTo', 	'relate_resource' => '6', 									])
            ->create([	'id' => '64', 	'resource' => '22', 	'name' => 'List Scope to List', 	'description' => 'List details of a list scope', 	'method' => 'List', 	'type' => 'belongsTo', 	'relate_resource' => '20', 									])
            ->create([	'id' => '65', 	'resource' => '22', 	'name' => 'List Scope to Scope', 	'description' => 'Scope details of a list scope', 	'method' => 'Scope', 	'type' => 'belongsTo', 	'relate_resource' => '7', 									])
            ->create([	'id' => '66', 	'resource' => '23', 	'name' => 'List Layout to List', 	'description' => 'List details of a list layout', 	'method' => 'List', 	'type' => 'belongsTo', 	'relate_resource' => '20', 									])
            ->create([	'id' => '67', 	'resource' => '23', 	'name' => 'List Layout to Relation', 	'description' => 'Relation details of a list layout', 	'method' => 'Relation', 	'type' => 'belongsTo', 	'relate_resource' => '6', 									])
            ->create([	'id' => '68', 	'resource' => '24', 	'name' => 'List search  to List', 	'description' => 'List details of a list search', 	'method' => 'List', 	'type' => 'belongsTo', 	'relate_resource' => '20', 									])
            ->create([	'id' => '69', 	'resource' => '24', 	'name' => 'List search  to Relation', 	'description' => 'Relation details of a list seach', 	'method' => 'Relation', 	'type' => 'belongsTo', 	'relate_resource' => '6', 									])
            ->create([	'id' => '70', 	'resource' => '26', 	'name' => 'Data relation to Data', 	'description' => 'Data details of a data relation', 	'method' => 'Data', 	'type' => 'belongsTo', 	'relate_resource' => '25', 									])
            ->create([	'id' => '71', 	'resource' => '26', 	'name' => 'Data relation to Relation', 	'description' => 'Relation details of a data relation', 	'method' => 'Relation', 	'type' => 'belongsTo', 	'relate_resource' => '6', 									])
            ->create([	'id' => '72', 	'resource' => '26', 	'name' => 'Data relation to Deep Relation', 	'description' => 'Level 1 Deep Relation details of a data relation', 	'method' => 'NRelation', 	'type' => 'belongsTo', 	'relate_resource' => '6', 									])
            ->create([	'id' => '73', 	'resource' => '27', 	'name' => 'Data scope to Data', 	'description' => 'Data details of a data scope', 	'method' => 'Data', 	'type' => 'belongsTo', 	'relate_resource' => '25', 									])
            ->create([	'id' => '74', 	'resource' => '27', 	'name' => 'Data scope to Scope', 	'description' => 'Scope details of a data scope', 	'method' => 'Scope', 	'type' => 'belongsTo', 	'relate_resource' => '7', 									])
            ->create([	'id' => '75', 	'resource' => '28', 	'name' => 'Data section to Data', 	'description' => 'Data details of a data view section', 	'method' => 'Data', 	'type' => 'belongsTo', 	'relate_resource' => '25', 									])
            ->create([	'id' => '76', 	'resource' => '30', 	'name' => 'Action Attributes', 	'description' => 'Attributes of a action', 	'method' => 'Attrs', 	'type' => 'hasMany', 	'relate_resource' => '32', 									])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
