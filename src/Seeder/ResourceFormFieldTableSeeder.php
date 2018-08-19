<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormFieldTableSeeder extends Seeder
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
        \Milestone\Appframe\ResourceFormField::truncate()
            ->create([	'resource_form' => '1', 	'name' => 'name', 	'type' => 'text', 	'label' => 'Name', 												])
            ->create([	'resource_form' => '1', 	'name' => 'email', 	'type' => 'text', 	'label' => 'Email', 												])
            ->create([	'resource_form' => '1', 	'name' => 'group', 	'type' => 'select', 	'label' => 'Group', 												])
            ->create([	'resource_form' => '2', 	'name' => 'name', 	'type' => 'text', 	'label' => 'Name', 												])
            ->create([	'resource_form' => '2', 	'name' => 'email', 	'type' => 'text', 	'label' => 'Email', 												])
            ->create([	'resource_form' => '3', 	'name' => 'name', 	'type' => 'text', 	'label' => 'Name', 												])
            ->create([	'resource_form' => '3', 	'name' => 'email', 	'type' => 'text', 	'label' => 'Email', 												])
            ->create([	'resource_form' => '4', 	'name' => 'name', 	'type' => 'text', 	'label' => 'Group Name', 												])
            ->create([	'resource_form' => '4', 	'name' => 'description', 	'type' => 'textarea', 	'label' => 'description', 												])
            ->create([	'resource_form' => '4', 	'name' => 'title', 	'type' => 'text', 	'label' => 'Group Title', 												])
            ->create([	'resource_form' => '5', 	'name' => 'name', 	'type' => 'text', 	'label' => 'Name', 												])
            ->create([	'resource_form' => '5', 	'name' => 'description', 	'type' => 'textarea', 	'label' => 'description', 												])
            ->create([	'resource_form' => '5', 	'name' => 'title', 	'type' => 'text', 	'label' => 'Title', 												])
            ->create([	'resource_form' => '6', 	'name' => 'name', 	'type' => 'text', 	'label' => 'Name', 												])
            ->create([	'resource_form' => '6', 	'name' => 'description', 	'type' => 'textarea', 	'label' => 'description', 												])
            ->create([	'resource_form' => '6', 	'name' => 'title', 	'type' => 'text', 	'label' => 'Title', 												])
            ->create([	'resource_form' => '6', 	'name' => 'namespace', 	'type' => 'text', 	'label' => 'Namespace', 												])
            ->create([	'resource_form' => '6', 	'name' => 'table', 	'type' => 'text', 	'label' => 'Table', 												])
            ->create([	'resource_form' => '6', 	'name' => 'key', 	'type' => 'text', 	'label' => 'Primary Key', 												])
            ->create([	'resource_form' => '6', 	'name' => 'controller', 	'type' => 'text', 	'label' => 'Controller Name', 												])
            ->create([	'resource_form' => '6', 	'name' => 'controller_namespace', 	'type' => 'text', 	'label' => 'Controller Namespace', 												])
            ->create([	'resource_form' => '7', 	'name' => 'name', 	'type' => 'text', 	'label' => 'Default Name', 												])
            ->create([	'resource_form' => '7', 	'name' => 'name_short', 	'type' => 'text', 	'label' => 'Short Name', 												])
            ->create([	'resource_form' => '7', 	'name' => 'name_long', 	'type' => 'text', 	'label' => 'Full Name', 												])
            ->create([	'resource_form' => '7', 	'name' => 'address_line1', 	'type' => 'textarea', 	'label' => 'Address Line 1', 												])
            ->create([	'resource_form' => '7', 	'name' => 'address_line2', 	'type' => 'textarea', 	'label' => 'Address Line 2', 												])
            ->create([	'resource_form' => '7', 	'name' => 'address_short', 	'type' => 'textarea', 	'label' => 'Short Address', 												])
            ->create([	'resource_form' => '7', 	'name' => 'address_long', 	'type' => 'textarea', 	'label' => 'Long Address', 												])
            ->create([	'resource_form' => '7', 	'name' => 'type', 	'type' => 'select', 	'label' => 'Contact Type', 	'collection' => 'Contacts', 											])
            ->create([	'resource_form' => '7', 	'name' => 'type_name', 	'type' => 'text', 	'label' => 'Type Name', 	'collection' => 'Contacts', 											])
            ->create([	'resource_form' => '7', 	'name' => 'detail', 	'type' => 'textarea', 	'label' => 'Detail', 	'collection' => 'Contacts', 											])
            ->create([	'resource_form' => '2', 	'name' => 'password', 	'type' => 'password', 	'label' => 'Password', 												])
            ->create([	'resource_form' => '3', 	'name' => 'password', 	'type' => 'password', 	'label' => 'Password', 												])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
