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
            ->create([	'id' => '1', 	'resource_form' => '3', 	'form_field' => '7', 	'colspan' => '6', 												])
            ->create([	'id' => '2', 	'resource_form' => '3', 	'form_field' => '8', 	'colspan' => '6', 												])
            ->create([	'id' => '3', 	'resource_form' => '3', 	'form_field' => '9', 	'colspan' => '6', 												])
            ->create([	'id' => '4', 	'resource_form' => '3', 	'form_field' => '10', 	'colspan' => '6', 												])
            ->create([	'id' => '5', 	'resource_form' => '6', 	'form_field' => '15', 	'colspan' => '6', 												])
            ->create([	'id' => '6', 	'resource_form' => '6', 	'form_field' => '16', 	'colspan' => '6', 												])
            ->create([	'id' => '7', 	'resource_form' => '6', 	'form_field' => '17', 	'colspan' => '12', 												])
            ->create([	'id' => '8', 	'resource_form' => '6', 	'form_field' => '18', 	'colspan' => '6', 												])
            ->create([	'id' => '9', 	'resource_form' => '6', 	'form_field' => '19', 	'colspan' => '6', 												])
            ->create([	'id' => '10', 	'resource_form' => '6', 	'form_field' => '20', 	'colspan' => '4', 												])
            ->create([	'id' => '11', 	'resource_form' => '6', 	'form_field' => '21', 	'colspan' => '4', 												])
            ->create([	'id' => '12', 	'resource_form' => '6', 	'form_field' => '22', 	'colspan' => '4', 												])
            ->create([	'id' => '13', 	'resource_form' => '7', 	'form_field' => '23', 	'colspan' => '12', 												])
            ->create([	'id' => '14', 	'resource_form' => '7', 	'form_field' => '24', 	'colspan' => '4', 												])
            ->create([	'id' => '15', 	'resource_form' => '7', 	'form_field' => '25', 	'colspan' => '4', 												])
            ->create([	'id' => '16', 	'resource_form' => '7', 	'form_field' => '26', 	'colspan' => '4', 												])
            ->create([	'id' => '17', 	'resource_form' => '7', 	'form_field' => '27', 	'colspan' => '12', 												])
            ->create([	'id' => '18', 	'resource_form' => '7', 	'form_field' => '28', 	'colspan' => '4', 												])
            ->create([	'id' => '19', 	'resource_form' => '7', 	'form_field' => '29', 	'colspan' => '4', 												])
            ->create([	'id' => '20', 	'resource_form' => '7', 	'form_field' => '30', 	'colspan' => '4', 												])
            ->create([	'id' => '21', 	'resource_form' => '9', 	'form_field' => '39', 	'colspan' => '12', 												])
            ->create([	'id' => '22', 	'resource_form' => '9', 	'form_field' => '40', 	'colspan' => '4', 												])
            ->create([	'id' => '23', 	'resource_form' => '9', 	'form_field' => '41', 	'colspan' => '4', 												])
            ->create([	'id' => '24', 	'resource_form' => '9', 	'form_field' => '42', 	'colspan' => '4', 												])
            ->create([	'id' => '25', 	'resource_form' => '9', 	'form_field' => '43', 	'colspan' => '12', 												])
            ->create([	'id' => '26', 	'resource_form' => '12', 	'form_field' => '55', 	'colspan' => '12', 												])
            ->create([	'id' => '27', 	'resource_form' => '12', 	'form_field' => '56', 	'colspan' => '3', 												])
            ->create([	'id' => '28', 	'resource_form' => '12', 	'form_field' => '57', 	'colspan' => '3', 												])
            ->create([	'id' => '29', 	'resource_form' => '12', 	'form_field' => '58', 	'colspan' => '3', 												])
            ->create([	'id' => '30', 	'resource_form' => '12', 	'form_field' => '59', 	'colspan' => '3', 												])
            ->create([	'id' => '31', 	'resource_form' => '12', 	'form_field' => '60', 	'colspan' => '12', 												])
            ->create([	'id' => '32', 	'resource_form' => '13', 	'form_field' => '61', 	'colspan' => '12', 												])
            ->create([	'id' => '33', 	'resource_form' => '13', 	'form_field' => '62', 	'colspan' => '6', 												])
            ->create([	'id' => '34', 	'resource_form' => '13', 	'form_field' => '63', 	'colspan' => '6', 												])
            ->create([	'id' => '35', 	'resource_form' => '13', 	'form_field' => '64', 	'colspan' => '6', 												])
            ->create([	'id' => '36', 	'resource_form' => '13', 	'form_field' => '65', 	'colspan' => '6', 												])
            ->create([	'id' => '37', 	'resource_form' => '13', 	'form_field' => '66', 	'colspan' => '12', 												])
            ->create([	'id' => '38', 	'resource_form' => '14', 	'form_field' => '67', 	'colspan' => '12', 												])
            ->create([	'id' => '39', 	'resource_form' => '14', 	'form_field' => '68', 	'colspan' => '6', 												])
            ->create([	'id' => '40', 	'resource_form' => '14', 	'form_field' => '69', 	'colspan' => '6', 												])
            ->create([	'id' => '41', 	'resource_form' => '14', 	'form_field' => '70', 	'colspan' => '12', 												])
            ->create([	'id' => '42', 	'resource_form' => '16', 	'form_field' => '75', 	'colspan' => '6', 												])
            ->create([	'id' => '43', 	'resource_form' => '16', 	'form_field' => '76', 	'colspan' => '6', 												])
            ->create([	'id' => '44', 	'resource_form' => '16', 	'form_field' => '77', 	'colspan' => '12', 												])
            ->create([	'id' => '45', 	'resource_form' => '17', 	'form_field' => '78', 	'colspan' => '6', 												])
            ->create([	'id' => '46', 	'resource_form' => '17', 	'form_field' => '79', 	'colspan' => '6', 												])
            ->create([	'id' => '47', 	'resource_form' => '17', 	'form_field' => '80', 	'colspan' => '12', 												])
            ->create([	'id' => '48', 	'resource_form' => '18', 	'form_field' => '81', 	'colspan' => '12', 												])
            ->create([	'id' => '49', 	'resource_form' => '18', 	'form_field' => '82', 	'colspan' => '12', 												])
            ->create([	'id' => '50', 	'resource_form' => '18', 	'form_field' => '83', 	'colspan' => '4', 												])
            ->create([	'id' => '51', 	'resource_form' => '18', 	'form_field' => '84', 	'colspan' => '8', 												])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
