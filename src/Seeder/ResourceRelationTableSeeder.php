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
            ->create([	'resource' => '1', 	'name' => 'User Groups', 	'description' => 'Which groups this user belongs to', 	'method' => 'Groups', 	'type' => 'belongsToMany', 	'relate_resource' => '2', 										])
            ->create([	'resource' => '2', 	'name' => 'Group Users', 	'description' => 'List of users belongs to this group', 	'method' => 'Users', 	'type' => 'belongsToMany', 	'relate_resource' => '1', 										])
            ->create([	'resource' => '2', 	'name' => 'Group Roles', 	'description' => 'Roles assigneed to this group', 	'method' => 'Roles', 	'type' => 'belongsToMany', 	'relate_resource' => '3', 										])
            ->create([	'resource' => '3', 	'name' => 'Role Groups', 	'description' => 'Details of groups this role assigned to', 	'method' => 'Groups', 	'type' => 'belongsToMany', 	'relate_resource' => '2', 										])
            ->create([	'resource' => '3', 	'name' => 'Role Resource', 	'description' => 'Resources assigned to a role', 	'method' => 'Resources', 	'type' => 'hasMany', 	'relate_resource' => '11', 										])
            ->create([	'resource' => '4', 	'name' => 'Resource Roles', 	'description' => 'The details of roles who have access to this resource', 	'method' => 'Roles', 	'type' => 'belongsToMany', 	'relate_resource' => '3', 										])
            ->create([	'resource' => '4', 	'name' => 'Resource Actions', 	'description' => 'Get actions available for the resource', 	'method' => 'Actions', 	'type' => 'hasMany', 	'relate_resource' => '7', 										])
            ->create([	'resource' => '7', 	'name' => 'Resource Action Methods', 	'description' => 'Handler details of an action', 	'method' => 'Method', 	'type' => 'hasOne', 	'relate_resource' => '8', 										])
            ->create([	'resource' => '7', 	'name' => 'Resource Action Lists', 	'description' => 'Lists where action available', 	'method' => 'Lists', 	'type' => 'hasMany', 	'relate_resource' => '9', 										])
            ->create([	'resource' => '7', 	'name' => 'Resource Action Data', 	'description' => 'Resource data where action available', 	'method' => 'Data', 	'type' => 'hasMany', 	'relate_resource' => '10', 										])
            ->create([	'resource' => '5', 	'name' => 'Organisation Contacts', 	'description' => 'Contact details of organisation', 	'method' => 'Contacts', 	'type' => 'hasMany', 	'relate_resource' => '6', 										])
            ->create([	'resource' => '11', 	'name' => 'Resource Details', 	'description' => 'Resource details', 	'method' => 'Resource', 	'type' => 'belongsTo', 	'relate_resource' => '4', 										])
            ->create([	'resource' => '4', 	'name' => 'Resource Forms', 	'description' => 'Forms available for a resource', 	'method' => 'Forms', 	'type' => 'hasMany', 	'relate_resource' => '12', 										])
            ->create([	'resource' => '12', 	'name' => 'Form Fields', 	'description' => 'Fields associated with a form', 	'method' => 'Fields', 	'type' => 'hasMany', 	'relate_resource' => '13', 										])
            ->create([	'resource' => '13', 	'name' => 'Field Attributes', 	'description' => 'Attributes of Field', 	'method' => 'Attributes', 	'type' => 'hasMany', 	'relate_resource' => '14', 										])
            ->create([	'resource' => '13', 	'name' => 'Field Options', 	'description' => 'Options of Field', 	'method' => 'Options', 	'type' => 'hasOne', 	'relate_resource' => '15', 										])
            ->create([	'resource' => '13', 	'name' => 'Field Validations', 	'description' => 'Validation details of field', 	'method' => 'Validations', 	'type' => 'hasMany', 	'relate_resource' => '16', 										])
            ->create([	'resource' => '12', 	'name' => 'From Resource', 	'description' => 'Resource this form belongs to', 	'method' => 'Resource', 	'type' => 'belongsTo', 	'relate_resource' => '4', 										])
            ->create([	'resource' => '12', 	'name' => 'Form Defaults', 	'description' => 'Predefined values for a form', 	'method' => 'Defaults', 	'type' => 'hasMany', 	'relate_resource' => '17', 										])
            ->create([	'resource' => '13', 	'name' => 'Field Data', 	'description' => 'Fields Database binding details', 	'method' => 'Data', 	'type' => 'hasOne', 	'relate_resource' => '18', 										])
            ->create([	'resource' => '4', 	'name' => 'Resource Relations', 	'description' => 'Relation of  a resource to another resource', 	'method' => 'Relations', 	'type' => 'hasMany', 	'relate_resource' => '26', 										])
            ->create([	'resource' => '18', 	'name' => 'Bind Data Relation', 	'description' => 'Relation to which the data to be bind', 	'method' => 'Relation', 	'type' => 'belongsTo', 	'relate_resource' => '26', 										])
            ->create([	'resource' => '17', 	'name' => 'Default Data Resource', 	'description' => 'Resource to which the forms predefined data to be bind', 	'method' => 'Relation', 	'type' => 'belongsTo', 	'relate_resource' => '4', 										])
            ->create([	'resource' => '19', 	'name' => 'Resource Details', 	'description' => 'Resource details of a list', 	'method' => 'Resource', 	'type' => 'belongsTo', 	'relate_resource' => '4', 										])
            ->create([	'resource' => '19', 	'name' => 'List Relations', 	'description' => 'Relations to be loaded on accessing list', 	'method' => 'Relations', 	'type' => 'hasMany', 	'relate_resource' => '20', 										])
            ->create([	'resource' => '4', 	'name' => 'Resource Scopes', 	'description' => 'Scopes available on a Resource', 	'method' => 'Scopes', 	'type' => 'hasMany', 	'relate_resource' => '21', 										])
            ->create([	'resource' => '19', 	'name' => 'List Scopes', 	'description' => 'Scopes by which a list to be filtered', 	'method' => 'Scopes', 	'type' => 'belongsToMany', 	'relate_resource' => '21', 										])
            ->create([	'resource' => '23', 	'name' => 'Data Relation', 	'description' => 'Relations to be loaded on a data view', 	'method' => 'Relations', 	'type' => 'hasMany', 	'relate_resource' => '24', 										])
            ->create([	'resource' => '23', 	'name' => 'Resource Details', 	'description' => 'Details of resource of a record', 	'method' => 'Resource', 	'type' => 'belongsTo', 	'relate_resource' => '4', 										])
            ->create([	'resource' => '19', 	'name' => 'List Layout', 	'description' => 'Layout of a list', 	'method' => 'Layout', 	'type' => 'hasMany', 	'relate_resource' => '25', 										])
            ->create([	'resource' => '26', 	'name' => 'Nested Relation', 	'description' => 'Nested Relation', 	'method' => 'Nest', 	'type' => 'hasMany', 	'relate_resource' => '26', 										])
            ->create([	'resource' => '26', 	'name' => 'Related Resource', 	'description' => 'Related Resource Details', 	'method' => 'Relation', 	'type' => 'belongsTo', 	'relate_resource' => '4', 										])
            ->create([	'resource' => '26', 	'name' => 'Form Layout', 	'description' => 'Layout details', 	'method' => 'Layout', 	'type' => 'hasMany', 	'relate_resource' => '27', 										])
            ->create([	'resource' => '23', 	'name' => 'Data View Section', 	'description' => 'Section details of data view', 	'method' => 'Sections', 	'type' => 'hasMany', 	'relate_resource' => '28', 										])
            ->create([	'resource' => '26', 	'name' => 'Data View Section Items', 	'description' => 'Items of a data view section', 	'method' => 'Items', 	'type' => 'hasMany', 	'relate_resource' => '29', 										])
            ->create([	'resource' => '28', 	'name' => 'Data Relation', 	'description' => 'View relation of a data', 	'method' => 'Relation', 	'type' => 'belongsTo', 	'relate_resource' => '26', 										])
            ->create([	'resource' => '29', 	'name' => 'Data item relation', 	'description' => 'View relation of a data item', 	'method' => 'Relation', 	'type' => 'belongsTo', 	'relate_resource' => '26', 										])
            ->create([	'resource' => '26', 	'name' => 'Owner Relation', 	'description' => 'View the owner resource', 	'method' => 'Owner', 	'type' => 'belongsTo', 	'relate_resource' => '4', 										])
            ->create([	'resource' => '12', 	'name' => 'Collections', 	'description' => 'Collection/Detail form', 	'method' => 'Collections', 	'type' => 'hasMany', 	'relate_resource' => '30', 										])
            ->create([	'resource' => '30', 	'name' => 'Collection Form', 	'description' => 'Collection Form', 	'method' => 'Form', 	'type' => 'belongsTo', 	'relate_resource' => '12', 										])
            ->create([	'resource' => '30', 	'name' => 'Relation', 	'description' => 'Details of Relation', 	'method' => 'Relation', 	'type' => 'belongsTo', 	'relate_resource' => '26', 										])
            ->create([	'resource' => '15', 	'name' => 'Field', 	'description' => 'Field details', 	'method' => 'Field', 	'type' => 'belongsTo', 	'relate_resource' => '13', 										])
            ->create([	'resource' => '13', 	'name' => 'Form', 	'description' => 'Form details', 	'method' => 'Form', 	'type' => 'belongsTo', 	'relate_resource' => '12', 										])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
