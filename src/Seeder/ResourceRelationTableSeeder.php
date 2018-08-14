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
        \Milestone\Appframe\ResourceRelation::truncate()
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
        ;
        \DB::statement('set foreign_key_checks = ' . $_);

    }
}
