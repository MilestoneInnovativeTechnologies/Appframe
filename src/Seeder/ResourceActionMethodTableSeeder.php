<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceActionMethodTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceActionMethod::truncate()
            ->create([	'id' => '1', 	'resource_action' => '1', 	'type' => 'Form', 	'idn1' => '1', 												])
            ->create([	'id' => '2', 	'resource_action' => '2', 	'type' => 'List', 	'idn1' => '1', 												])
            ->create([	'id' => '3', 	'resource_action' => '3', 	'type' => 'FormWithData', 	'idn1' => '2', 	'idn2' => '1', 											])
            ->create([	'id' => '4', 	'resource_action' => '4', 	'type' => 'FormWithData', 	'idn1' => '3', 	'idn2' => '1', 											])
            ->create([	'id' => '5', 	'resource_action' => '5', 	'type' => 'Form', 	'idn1' => '4', 												])
            ->create([	'id' => '6', 	'resource_action' => '6', 	'type' => 'List', 	'idn1' => '2', 												])
            ->create([	'id' => '7', 	'resource_action' => '7', 	'type' => 'Form', 	'idn1' => '5', 												])
            ->create([	'id' => '8', 	'resource_action' => '8', 	'type' => 'AddRelation', 	'idn1' => '7', 	'idn2' => '6', 											])
            ->create([	'id' => '9', 	'resource_action' => '9', 	'type' => 'List', 	'idn1' => '3', 												])
            ->create([	'id' => '10', 	'resource_action' => '10', 	'type' => 'Form', 	'idn1' => '7', 												])
            ->create([	'id' => '11', 	'resource_action' => '11', 	'type' => 'List', 	'idn1' => '4', 												])
            ->create([	'id' => '12', 	'resource_action' => '12', 	'type' => 'AddRelation', 	'idn1' => '14', 	'idn2' => '8', 											])
            ->create([	'id' => '13', 	'resource_action' => '13', 	'type' => 'Form', 	'idn1' => '10', 												])
            ->create([	'id' => '14', 	'resource_action' => '14', 	'type' => 'List', 	'idn1' => '5', 												])
            ->create([	'id' => '15', 	'resource_action' => '15', 	'type' => 'AddRelation', 	'idn1' => '54', 	'idn2' => '11', 											])
            ->create([	'id' => '16', 	'resource_action' => '16', 	'type' => 'Form', 	'idn1' => '12', 												])
            ->create([	'id' => '17', 	'resource_action' => '17', 	'type' => 'List', 	'idn1' => '6', 												])
            ->create([	'id' => '18', 	'resource_action' => '18', 	'type' => 'AddRelation', 	'idn1' => '55', 	'idn2' => '13', 											])
            ->create([	'id' => '19', 	'resource_action' => '19', 	'type' => 'ListRelation', 	'idn1' => '14', 	'idn2' => '4', 											])
            ->create([	'id' => '20', 	'resource_action' => '20', 	'type' => 'ListRelation', 	'idn1' => '54', 	'idn2' => '5', 											])
            ->create([	'id' => '21', 	'resource_action' => '21', 	'type' => 'ListRelation', 	'idn1' => '55', 	'idn2' => '6', 											])
            ->create([	'id' => '22', 	'resource_action' => '22', 	'type' => 'ListRelation', 	'idn1' => '7', 	'idn2' => '3', 											])
            ->create([	'id' => '23', 	'resource_action' => '23', 	'type' => 'ListRelation', 	'idn1' => '15', 	'idn2' => '7', 											])
            ->create([	'id' => '24', 	'resource_action' => '24', 	'type' => 'ListRelation', 	'idn1' => '56', 	'idn2' => '8', 											])
            ->create([	'id' => '25', 	'resource_action' => '25', 	'type' => 'ListRelation', 	'idn1' => '38', 	'idn2' => '9', 											])
            ->create([	'id' => '26', 	'resource_action' => '26', 	'type' => 'ListRelation', 	'idn1' => '26', 	'idn2' => '10', 											])
            ->create([	'id' => '27', 	'resource_action' => '27', 	'type' => 'ListRelation', 	'idn1' => '28', 	'idn2' => '11', 											])
            ->create([	'id' => '28', 	'resource_action' => '28', 	'type' => 'ListRelation', 	'idn1' => '31', 	'idn2' => '12', 											])
            ->create([	'id' => '29', 	'resource_action' => '29', 	'type' => 'ListRelation', 	'idn1' => '43', 	'idn2' => '13', 											])
            ->create([	'id' => '30', 	'resource_action' => '30', 	'type' => 'ListRelation', 	'idn1' => '29', 	'idn2' => '14', 											])
            ->create([	'id' => '31', 	'resource_action' => '31', 	'type' => 'ListRelation', 	'idn1' => '50', 	'idn2' => '15', 											])
            ->create([	'id' => '32', 	'resource_action' => '32', 	'type' => 'ListRelation', 	'idn1' => '34', 	'idn2' => '16', 											])
            ->create([	'id' => '33', 	'resource_action' => '33', 	'type' => 'ListRelation', 	'idn1' => '52', 	'idn2' => '3', 											])
            ->create([	'id' => '34', 	'resource_action' => '34', 	'type' => 'ListRelation', 	'idn1' => '76', 	'idn2' => '17', 											])
            ->create([	'id' => '35', 	'resource_action' => '35', 	'type' => 'ListRelation', 	'idn1' => '9', 	'idn2' => '5', 											])
            ->create([	'id' => '36', 	'resource_action' => '36', 	'type' => 'ListRelation', 	'idn1' => '10', 	'idn2' => '6', 											])
            ->create([	'id' => '37', 	'resource_action' => '37', 	'type' => 'ListRelation', 	'idn1' => '16', 	'idn2' => '18', 											])
            ->create([	'id' => '38', 	'resource_action' => '38', 	'type' => 'ListRelation', 	'idn1' => '17', 	'idn2' => '19', 											])
            ->create([	'id' => '39', 	'resource_action' => '39', 	'type' => 'ListRelation', 	'idn1' => '18', 	'idn2' => '20', 											])
            ->create([	'id' => '40', 	'resource_action' => '40', 	'type' => 'ListRelation', 	'idn1' => '44', 	'idn2' => '21', 											])
            ->create([	'id' => '41', 	'resource_action' => '41', 	'type' => 'ListRelation', 	'idn1' => '49', 	'idn2' => '22', 											])
            ->create([	'id' => '42', 	'resource_action' => '42', 	'type' => 'ManageRelation', 	'idn1' => '51', 	'idn2' => '3', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
