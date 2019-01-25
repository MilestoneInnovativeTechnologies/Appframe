<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormFieldDataTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceFormFieldData::truncate()
            ->create([	'id' => '1', 	'form_field' => '1', 	'attribute' => 'name', 													])
            ->create([	'id' => '2', 	'form_field' => '2', 	'attribute' => 'group', 	'relation' => '1', 												])
            ->create([	'id' => '3', 	'form_field' => '3', 	'attribute' => 'email', 													])
            ->create([	'id' => '4', 	'form_field' => '4', 	'attribute' => 'password', 													])
            ->create([	'id' => '5', 	'form_field' => '5', 	'attribute' => 'name', 													])
            ->create([	'id' => '6', 	'form_field' => '6', 	'attribute' => 'email', 													])
            ->create([	'id' => '7', 	'form_field' => '7', 	'attribute' => 'group', 	'relation' => '1', 												])
            ->create([	'id' => '8', 	'form_field' => '8', 	'attribute' => 'password', 													])
            ->create([	'id' => '9', 	'form_field' => '9', 	'attribute' => 'name', 													])
            ->create([	'id' => '10', 	'form_field' => '10', 	'attribute' => 'title', 													])
            ->create([	'id' => '11', 	'form_field' => '11', 	'attribute' => 'description', 													])
            ->create([	'id' => '12', 	'form_field' => '12', 	'attribute' => 'namespace', 													])
            ->create([	'id' => '13', 	'form_field' => '13', 	'attribute' => 'table', 													])
            ->create([	'id' => '14', 	'form_field' => '14', 	'attribute' => 'controller', 													])
            ->create([	'id' => '15', 	'form_field' => '15', 	'attribute' => 'controller_namespace', 													])
            ->create([	'id' => '16', 	'form_field' => '16', 	'attribute' => 'development', 													])
            ->create([	'id' => '17', 	'form_field' => '17', 	'attribute' => 'resource', 													])
            ->create([	'id' => '18', 	'form_field' => '18', 	'attribute' => 'name', 													])
            ->create([	'id' => '19', 	'form_field' => '19', 	'attribute' => 'menu', 													])
            ->create([	'id' => '20', 	'form_field' => '20', 	'attribute' => 'title', 													])
            ->create([	'id' => '21', 	'form_field' => '21', 	'attribute' => 'description', 													])
            ->create([	'id' => '22', 	'form_field' => '22', 	'attribute' => 'type', 	'relation' => '8', 												])
            ->create([	'id' => '23', 	'form_field' => '23', 	'attribute' => 'idn1', 	'relation' => '8', 												])
            ->create([	'id' => '24', 	'form_field' => '24', 	'attribute' => 'idn2', 	'relation' => '8', 												])
            ->create([	'id' => '25', 	'form_field' => '25', 	'attribute' => 'resource', 													])
            ->create([	'id' => '26', 	'form_field' => '26', 	'attribute' => 'name', 													])
            ->create([	'id' => '27', 	'form_field' => '27', 	'attribute' => 'menu', 													])
            ->create([	'id' => '28', 	'form_field' => '28', 	'attribute' => 'title', 													])
            ->create([	'id' => '29', 	'form_field' => '29', 	'attribute' => 'description', 													])
            ->create([	'id' => '30', 	'form_field' => '30', 	'attribute' => 'type', 	'relation' => '8', 												])
            ->create([	'id' => '31', 	'form_field' => '31', 	'attribute' => 'idn1', 	'relation' => '8', 												])
            ->create([	'id' => '32', 	'form_field' => '32', 	'attribute' => 'idn2', 	'relation' => '8', 												])
            ->create([	'id' => '33', 	'form_field' => '33', 	'attribute' => 'resource', 													])
            ->create([	'id' => '34', 	'form_field' => '34', 	'attribute' => 'name', 													])
            ->create([	'id' => '35', 	'form_field' => '35', 	'attribute' => 'title', 													])
            ->create([	'id' => '36', 	'form_field' => '36', 	'attribute' => 'action_text', 													])
            ->create([	'id' => '37', 	'form_field' => '37', 	'attribute' => 'description', 													])
            ->create([	'id' => '38', 	'form_field' => '38', 	'attribute' => 'resource', 													])
            ->create([	'id' => '39', 	'form_field' => '39', 	'attribute' => 'name', 													])
            ->create([	'id' => '40', 	'form_field' => '40', 	'attribute' => 'title', 													])
            ->create([	'id' => '41', 	'form_field' => '41', 	'attribute' => 'action_text', 													])
            ->create([	'id' => '42', 	'form_field' => '42', 	'attribute' => 'description', 													])
            ->create([	'id' => '43', 	'form_field' => '43', 	'attribute' => 'resource_form', 													])
            ->create([	'id' => '44', 	'form_field' => '44', 	'attribute' => 'name', 													])
            ->create([	'id' => '45', 	'form_field' => '45', 	'attribute' => 'type', 													])
            ->create([	'id' => '46', 	'form_field' => '46', 	'attribute' => 'label', 													])
            ->create([	'id' => '47', 	'form_field' => '47', 	'attribute' => 'relation', 	'relation' => '21', 												])
            ->create([	'id' => '48', 	'form_field' => '48', 	'attribute' => 'attribute', 	'relation' => '21', 												])
            ->create([	'id' => '49', 	'form_field' => '49', 	'attribute' => 'resource', 													])
            ->create([	'id' => '50', 	'form_field' => '50', 	'attribute' => 'name', 													])
            ->create([	'id' => '51', 	'form_field' => '51', 	'attribute' => 'title', 													])
            ->create([	'id' => '52', 	'form_field' => '52', 	'attribute' => 'identity', 													])
            ->create([	'id' => '53', 	'form_field' => '53', 	'attribute' => 'items_per_page', 													])
            ->create([	'id' => '54', 	'form_field' => '54', 	'attribute' => 'description', 													])
            ->create([	'id' => '55', 	'form_field' => '55', 	'attribute' => 'resource', 													])
            ->create([	'id' => '56', 	'form_field' => '56', 	'attribute' => 'name', 													])
            ->create([	'id' => '57', 	'form_field' => '57', 	'attribute' => 'title', 													])
            ->create([	'id' => '58', 	'form_field' => '58', 	'attribute' => 'identity', 													])
            ->create([	'id' => '59', 	'form_field' => '59', 	'attribute' => 'items_per_page', 													])
            ->create([	'id' => '60', 	'form_field' => '60', 	'attribute' => 'description', 													])
            ->create([	'id' => '61', 	'form_field' => '61', 	'attribute' => 'resource', 													])
            ->create([	'id' => '62', 	'form_field' => '62', 	'attribute' => 'name', 													])
            ->create([	'id' => '63', 	'form_field' => '63', 	'attribute' => 'title_field', 													])
            ->create([	'id' => '64', 	'form_field' => '64', 	'attribute' => 'description', 													])
            ->create([	'id' => '65', 	'form_field' => '65', 	'attribute' => 'resource', 													])
            ->create([	'id' => '66', 	'form_field' => '66', 	'attribute' => 'name', 													])
            ->create([	'id' => '67', 	'form_field' => '67', 	'attribute' => 'title_field', 													])
            ->create([	'id' => '68', 	'form_field' => '68', 	'attribute' => 'description', 													])
            ->create([	'id' => '69', 	'form_field' => '69', 	'attribute' => 'name', 													])
            ->create([	'id' => '70', 	'form_field' => '70', 	'attribute' => 'title', 													])
            ->create([	'id' => '71', 	'form_field' => '71', 	'attribute' => 'description', 													])
            ->create([	'id' => '72', 	'form_field' => '72', 	'attribute' => 'name', 													])
            ->create([	'id' => '73', 	'form_field' => '73', 	'attribute' => 'title', 													])
            ->create([	'id' => '74', 	'form_field' => '74', 	'attribute' => 'description', 													])
            ->create([	'id' => '75', 	'form_field' => '75', 	'attribute' => 'role', 													])
            ->create([	'id' => '76', 	'form_field' => '76', 	'attribute' => 'resource', 													])
            ->create([	'id' => '77', 	'form_field' => '77', 	'attribute' => 'actions_availability', 													])
            ->create([	'id' => '78', 	'form_field' => '78', 	'attribute' => 'actions', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
