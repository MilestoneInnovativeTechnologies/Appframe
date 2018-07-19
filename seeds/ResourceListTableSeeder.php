<?php

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
        Milestone\Appframe\ResourceList::truncate()
            ->create([	'resource' => '1',	'name' => 'AllUsers',	'description' => 'Lists all users',	'title' => 'Users',												])
            ->create([	'resource' => '1',	'name' => 'AllAdministrators',	'description' => 'List all users of  administrator group',	'title' => 'Administrators',												])
            ->create([	'resource' => '1',	'name' => 'AllDevelopers',	'description' => 'List all users of  developer group',	'title' => 'Developers',												])
            ->create([	'resource' => '2',	'name' => 'AllGroups',	'description' => 'List all groups a user can accommodate',	'title' => 'Groups',												])
            ->create([	'resource' => '3',	'name' => 'AllRoles',	'description' => 'List of Roles available in this module',	'title' => 'Roles',												])
            ->create([	'resource' => '4',	'name' => 'AllResources',	'description' => 'List all available Resources',	'title' => 'Resources',												])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
