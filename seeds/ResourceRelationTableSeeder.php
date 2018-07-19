<?php

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
        Milestone\Appframe\ResourceRelation::truncate()
            ->create([	'resource' => '1',	'name' => 'User Groups',	'description' => 'Which groups this user belongs to',	'method' => 'Groups',	'type' => 'belongsToMany',	'relate_resource' => '2',										])
            ->create([	'resource' => '2',	'name' => 'Group Users',	'description' => 'List of users belongs to this group',	'method' => 'Users',	'type' => 'belongsToMany',	'relate_resource' => '1',										])
            ->create([	'resource' => '2',	'name' => 'Group Roles',	'description' => 'Roles assigneed to this group',	'method' => 'Roles',	'type' => 'belongsToMany',	'relate_resource' => '3',										])
            ->create([	'resource' => '3',	'name' => 'Role Groups',	'description' => 'Details of groups this role assigned to',	'method' => 'Groups',	'type' => 'belongsToMany',	'relate_resource' => '2',										])
            ->create([	'resource' => '3',	'name' => 'Role Resource',	'description' => 'The resources which grand access to users have this role',	'method' => 'Resources',	'type' => 'belongsToMany',	'relate_resource' => '7',										])
            ->create([	'resource' => '4',	'name' => 'Resource Roles',	'description' => 'The details of roles who have access to this resource',	'method' => 'Roles',	'type' => 'belongsToMany',	'relate_resource' => '3',										])
            ->create([	'resource' => '5',	'name' => 'Organisation Contacts',	'description' => 'Contact details of organisation',	'method' => 'Contacts',	'type' => 'hasMany',	'relate_resource' => '6',										])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
