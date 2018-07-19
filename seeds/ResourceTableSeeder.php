<?php

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
        Milestone\Appframe\Resource::truncate()
            ->create([	'name' => 'User',	'description' => 'All the users of this app',	'title' => 'Users',	'namespace' => 'App',	'table' => 'users',											])
            ->create([	'name' => 'FWGroup',	'description' => 'Groups for users. Every user belongs to any or multiple groups',	'title' => 'Groups',	'namespace' => 'App',	'table' => '__groups',											])
            ->create([	'name' => 'FWRole',	'description' => 'Roles defines which resources should a group have access',	'title' => 'Roles',	'namespace' => 'App',	'table' => '__roles',											])
            ->create([	'name' => 'FWResource',	'description' => 'Each part of this module',	'title' => 'Resource',	'namespace' => 'App',	'table' => '__resources',											])
            ->create([	'name' => 'FWOrganisation',	'description' => 'Details of the organisation',	'title' => 'Organisation',	'namespace' => 'App',	'table' => '__organisation',											])
            ->create([	'name' => 'FWOrganisationContact',	'description' => 'Contact details of organisation',	'title' => 'Contacts',	'namespace' => 'App',	'table' => '__organisation_contacts',											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
