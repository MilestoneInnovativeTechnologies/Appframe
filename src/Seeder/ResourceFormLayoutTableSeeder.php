<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormLayoutTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceFormLayout::truncate()
            ->create([	'id' => '1', 	'resource_form' => '1', 	'form_field' => '1', 	'colspan' => '6', 												])
            ->create([	'id' => '2', 	'resource_form' => '1', 	'form_field' => '2', 	'colspan' => '6', 												])
            ->create([	'id' => '3', 	'resource_form' => '1', 	'form_field' => '3', 	'colspan' => '6', 												])
            ->create([	'id' => '4', 	'resource_form' => '1', 	'form_field' => '4', 	'colspan' => '6', 												])
            ->create([	'id' => '5', 	'resource_form' => '4', 	'form_field' => '9', 	'colspan' => '6', 												])
            ->create([	'id' => '6', 	'resource_form' => '4', 	'form_field' => '10', 	'colspan' => '6', 												])
            ->create([	'id' => '7', 	'resource_form' => '4', 	'form_field' => '11', 	'colspan' => '12', 												])
            ->create([	'id' => '8', 	'resource_form' => '4', 	'form_field' => '12', 	'colspan' => '6', 												])
            ->create([	'id' => '9', 	'resource_form' => '4', 	'form_field' => '13', 	'colspan' => '6', 												])
            ->create([	'id' => '10', 	'resource_form' => '4', 	'form_field' => '14', 	'colspan' => '4', 												])
            ->create([	'id' => '11', 	'resource_form' => '4', 	'form_field' => '15', 	'colspan' => '4', 												])
            ->create([	'id' => '12', 	'resource_form' => '4', 	'form_field' => '16', 	'colspan' => '4', 												])
            ->create([	'id' => '13', 	'resource_form' => '5', 	'form_field' => '17', 	'colspan' => '12', 												])
            ->create([	'id' => '14', 	'resource_form' => '5', 	'form_field' => '18', 	'colspan' => '4', 												])
            ->create([	'id' => '15', 	'resource_form' => '5', 	'form_field' => '19', 	'colspan' => '4', 												])
            ->create([	'id' => '16', 	'resource_form' => '5', 	'form_field' => '20', 	'colspan' => '4', 												])
            ->create([	'id' => '17', 	'resource_form' => '5', 	'form_field' => '21', 	'colspan' => '12', 												])
            ->create([	'id' => '18', 	'resource_form' => '5', 	'form_field' => '22', 	'colspan' => '4', 												])
            ->create([	'id' => '19', 	'resource_form' => '5', 	'form_field' => '23', 	'colspan' => '4', 												])
            ->create([	'id' => '20', 	'resource_form' => '5', 	'form_field' => '24', 	'colspan' => '4', 												])
            ->create([	'id' => '21', 	'resource_form' => '7', 	'form_field' => '33', 	'colspan' => '12', 												])
            ->create([	'id' => '22', 	'resource_form' => '7', 	'form_field' => '34', 	'colspan' => '4', 												])
            ->create([	'id' => '23', 	'resource_form' => '7', 	'form_field' => '35', 	'colspan' => '4', 												])
            ->create([	'id' => '24', 	'resource_form' => '7', 	'form_field' => '36', 	'colspan' => '4', 												])
            ->create([	'id' => '25', 	'resource_form' => '7', 	'form_field' => '37', 	'colspan' => '12', 												])
            ->create([	'id' => '26', 	'resource_form' => '10', 	'form_field' => '49', 	'colspan' => '12', 												])
            ->create([	'id' => '27', 	'resource_form' => '10', 	'form_field' => '50', 	'colspan' => '4', 												])
            ->create([	'id' => '28', 	'resource_form' => '10', 	'form_field' => '51', 	'colspan' => '4', 												])
            ->create([	'id' => '29', 	'resource_form' => '10', 	'form_field' => '52', 	'colspan' => '4', 												])
            ->create([	'id' => '30', 	'resource_form' => '10', 	'form_field' => '53', 	'colspan' => '12', 												])
            ->create([	'id' => '31', 	'resource_form' => '12', 	'form_field' => '59', 	'colspan' => '12', 												])
            ->create([	'id' => '32', 	'resource_form' => '12', 	'form_field' => '60', 	'colspan' => '6', 												])
            ->create([	'id' => '33', 	'resource_form' => '12', 	'form_field' => '61', 	'colspan' => '6', 												])
            ->create([	'id' => '34', 	'resource_form' => '12', 	'form_field' => '62', 	'colspan' => '12', 												])
            ->create([	'id' => '35', 	'resource_form' => '14', 	'form_field' => '67', 	'colspan' => '6', 												])
            ->create([	'id' => '36', 	'resource_form' => '14', 	'form_field' => '68', 	'colspan' => '6', 												])
            ->create([	'id' => '37', 	'resource_form' => '14', 	'form_field' => '69', 	'colspan' => '12', 												])
            ->create([	'id' => '38', 	'resource_form' => '15', 	'form_field' => '70', 	'colspan' => '6', 												])
            ->create([	'id' => '39', 	'resource_form' => '15', 	'form_field' => '71', 	'colspan' => '6', 												])
            ->create([	'id' => '40', 	'resource_form' => '15', 	'form_field' => '72', 	'colspan' => '12', 												])
            ->create([	'id' => '41', 	'resource_form' => '16', 	'form_field' => '73', 	'colspan' => '12', 												])
            ->create([	'id' => '42', 	'resource_form' => '16', 	'form_field' => '74', 	'colspan' => '12', 												])
            ->create([	'id' => '43', 	'resource_form' => '16', 	'form_field' => '75', 	'colspan' => '4', 												])
            ->create([	'id' => '44', 	'resource_form' => '16', 	'form_field' => '76', 	'colspan' => '8', 												])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
