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
        \Milestone\Appframe\Model\ResourceFormField::truncate()
            ->create([	'id' => '1', 	'resource_form' => '1', 	'name' => 'name', 	'type' => 'text', 	'label' => 'Name', 											])
            ->create([	'id' => '2', 	'resource_form' => '1', 	'name' => 'group', 	'type' => 'select', 	'label' => 'Group', 											])
            ->create([	'id' => '3', 	'resource_form' => '1', 	'name' => 'email', 	'type' => 'text', 	'label' => 'Email', 											])
            ->create([	'id' => '4', 	'resource_form' => '1', 	'name' => 'password', 	'type' => 'password', 	'label' => 'Password', 											])
            ->create([	'id' => '5', 	'resource_form' => '2', 	'name' => 'name', 	'type' => 'text', 	'label' => 'Name', 											])
            ->create([	'id' => '6', 	'resource_form' => '2', 	'name' => 'email', 	'type' => 'text', 	'label' => 'Email', 											])
            ->create([	'id' => '7', 	'resource_form' => '2', 	'name' => 'group', 	'type' => 'multiselect', 	'label' => 'Group', 											])
            ->create([	'id' => '8', 	'resource_form' => '3', 	'name' => 'password', 	'type' => 'password', 	'label' => 'Change Password to', 											])
            ->create([	'id' => '9', 	'resource_form' => '4', 	'name' => 'name', 	'type' => 'text', 	'label' => 'Name', 											])
            ->create([	'id' => '10', 	'resource_form' => '4', 	'name' => 'title', 	'type' => 'text', 	'label' => 'Title', 											])
            ->create([	'id' => '11', 	'resource_form' => '4', 	'name' => 'description', 	'type' => 'textarea', 	'label' => 'Description', 											])
            ->create([	'id' => '12', 	'resource_form' => '4', 	'name' => 'namespace', 	'type' => 'text', 	'label' => 'Namespace', 											])
            ->create([	'id' => '13', 	'resource_form' => '4', 	'name' => 'table', 	'type' => 'text', 	'label' => 'Table', 											])
            ->create([	'id' => '14', 	'resource_form' => '4', 	'name' => 'controller', 	'type' => 'text', 	'label' => 'Controller', 											])
            ->create([	'id' => '15', 	'resource_form' => '4', 	'name' => 'controller_namespace', 	'type' => 'text', 	'label' => 'Controller Namespace', 											])
            ->create([	'id' => '16', 	'resource_form' => '4', 	'name' => 'development', 	'type' => 'select', 	'label' => 'Development Resource', 											])
            ->create([	'id' => '17', 	'resource_form' => '5', 	'name' => 'resource', 	'type' => 'select', 	'label' => 'Select Resource', 											])
            ->create([	'id' => '18', 	'resource_form' => '5', 	'name' => 'name', 	'type' => 'text', 	'label' => 'Action Name', 											])
            ->create([	'id' => '19', 	'resource_form' => '5', 	'name' => 'menu', 	'type' => 'text', 	'label' => 'Main Menu Caption', 											])
            ->create([	'id' => '20', 	'resource_form' => '5', 	'name' => 'title', 	'type' => 'text', 	'label' => 'List Menu Caption', 											])
            ->create([	'id' => '21', 	'resource_form' => '5', 	'name' => 'description', 	'type' => 'textarea', 	'label' => 'Description', 											])
            ->create([	'id' => '22', 	'resource_form' => '5', 	'name' => 'type', 	'type' => 'select', 	'label' => 'Action Type', 											])
            ->create([	'id' => '23', 	'resource_form' => '5', 	'name' => 'idn1', 	'type' => 'select', 	'label' => 'Type Detail - 1', 											])
            ->create([	'id' => '24', 	'resource_form' => '5', 	'name' => 'idn2', 	'type' => 'select', 	'label' => 'Type Detail - 2', 											])
            ->create([	'id' => '25', 	'resource_form' => '6', 	'name' => 'resource', 	'type' => 'text', 	'label' => 'Select Resource', 											])
            ->create([	'id' => '26', 	'resource_form' => '6', 	'name' => 'name', 	'type' => 'text', 	'label' => 'Action Name', 											])
            ->create([	'id' => '27', 	'resource_form' => '6', 	'name' => 'menu', 	'type' => 'text', 	'label' => 'Main Menu Caption', 											])
            ->create([	'id' => '28', 	'resource_form' => '6', 	'name' => 'title', 	'type' => 'text', 	'label' => 'List Menu Caption', 											])
            ->create([	'id' => '29', 	'resource_form' => '6', 	'name' => 'description', 	'type' => 'textarea', 	'label' => 'Description', 											])
            ->create([	'id' => '30', 	'resource_form' => '6', 	'name' => 'type', 	'type' => 'select', 	'label' => 'Action Type', 											])
            ->create([	'id' => '31', 	'resource_form' => '6', 	'name' => 'idn1', 	'type' => 'select', 	'label' => 'Type Detail - 1', 											])
            ->create([	'id' => '32', 	'resource_form' => '6', 	'name' => 'idn2', 	'type' => 'select', 	'label' => 'Type Detail - 2', 											])
            ->create([	'id' => '33', 	'resource_form' => '7', 	'name' => 'resource', 	'type' => 'select', 	'label' => 'Select Resource', 											])
            ->create([	'id' => '34', 	'resource_form' => '7', 	'name' => 'name', 	'type' => 'text', 	'label' => 'Form Name', 											])
            ->create([	'id' => '35', 	'resource_form' => '7', 	'name' => 'title', 	'type' => 'text', 	'label' => 'Form Title', 											])
            ->create([	'id' => '36', 	'resource_form' => '7', 	'name' => 'action_text', 	'type' => 'text', 	'label' => 'Action Text', 											])
            ->create([	'id' => '37', 	'resource_form' => '7', 	'name' => 'description', 	'type' => 'textarea', 	'label' => 'Description', 											])
            ->create([	'id' => '38', 	'resource_form' => '8', 	'name' => 'resource', 	'type' => 'text', 	'label' => 'Select Resource', 											])
            ->create([	'id' => '39', 	'resource_form' => '8', 	'name' => 'name', 	'type' => 'text', 	'label' => 'Form Name', 											])
            ->create([	'id' => '40', 	'resource_form' => '8', 	'name' => 'title', 	'type' => 'text', 	'label' => 'Form Title', 											])
            ->create([	'id' => '41', 	'resource_form' => '8', 	'name' => 'action_text', 	'type' => 'text', 	'label' => 'Action Text', 											])
            ->create([	'id' => '42', 	'resource_form' => '8', 	'name' => 'description', 	'type' => 'textarea', 	'label' => 'Description', 											])
            ->create([	'id' => '43', 	'resource_form' => '9', 	'name' => 'resource_form', 	'type' => 'select', 	'label' => 'Select Form', 											])
            ->create([	'id' => '44', 	'resource_form' => '9', 	'name' => 'name', 	'type' => 'text', 	'label' => 'Name', 											])
            ->create([	'id' => '45', 	'resource_form' => '9', 	'name' => 'type', 	'type' => 'text', 	'label' => 'Type', 											])
            ->create([	'id' => '46', 	'resource_form' => '9', 	'name' => 'label', 	'type' => 'text', 	'label' => 'Label', 											])
            ->create([	'id' => '47', 	'resource_form' => '9', 	'name' => 'relation', 	'type' => 'select', 	'label' => 'Relation', 											])
            ->create([	'id' => '48', 	'resource_form' => '9', 	'name' => 'attribute', 	'type' => 'text', 	'label' => 'Attribute', 											])
            ->create([	'id' => '49', 	'resource_form' => '10', 	'name' => 'resource', 	'type' => 'select', 	'label' => 'Select Resource', 											])
            ->create([	'id' => '50', 	'resource_form' => '10', 	'name' => 'name', 	'type' => 'text', 	'label' => 'List Name', 											])
            ->create([	'id' => '51', 	'resource_form' => '10', 	'name' => 'title', 	'type' => 'text', 	'label' => 'Title', 											])
            ->create([	'id' => '52', 	'resource_form' => '10', 	'name' => 'items_per_page', 	'type' => 'text', 	'label' => 'Items to display per page', 											])
            ->create([	'id' => '53', 	'resource_form' => '10', 	'name' => 'description', 	'type' => 'textarea', 	'label' => 'Description', 											])
            ->create([	'id' => '54', 	'resource_form' => '11', 	'name' => 'resource', 	'type' => 'text', 	'label' => 'Resource', 											])
            ->create([	'id' => '55', 	'resource_form' => '11', 	'name' => 'name', 	'type' => 'text', 	'label' => 'List Name', 											])
            ->create([	'id' => '56', 	'resource_form' => '11', 	'name' => 'title', 	'type' => 'text', 	'label' => 'Title', 											])
            ->create([	'id' => '57', 	'resource_form' => '11', 	'name' => 'items_per_page', 	'type' => 'text', 	'label' => 'Items to display per page', 											])
            ->create([	'id' => '58', 	'resource_form' => '11', 	'name' => 'description', 	'type' => 'textarea', 	'label' => 'Description', 											])
            ->create([	'id' => '59', 	'resource_form' => '12', 	'name' => 'resource', 	'type' => 'select', 	'label' => 'Select Resource', 											])
            ->create([	'id' => '60', 	'resource_form' => '12', 	'name' => 'name', 	'type' => 'text', 	'label' => 'Name', 											])
            ->create([	'id' => '61', 	'resource_form' => '12', 	'name' => 'title_field', 	'type' => 'text', 	'label' => 'Title Field', 											])
            ->create([	'id' => '62', 	'resource_form' => '12', 	'name' => 'description', 	'type' => 'textarea', 	'label' => 'Description', 											])
            ->create([	'id' => '63', 	'resource_form' => '13', 	'name' => 'resource', 	'type' => 'text', 	'label' => 'Resource', 											])
            ->create([	'id' => '64', 	'resource_form' => '13', 	'name' => 'name', 	'type' => 'text', 	'label' => 'Name', 											])
            ->create([	'id' => '65', 	'resource_form' => '13', 	'name' => 'title_field', 	'type' => 'text', 	'label' => 'Title Field', 											])
            ->create([	'id' => '66', 	'resource_form' => '13', 	'name' => 'description', 	'type' => 'textarea', 	'label' => 'Description', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
