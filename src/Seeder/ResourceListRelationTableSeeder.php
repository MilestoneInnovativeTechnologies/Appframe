<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceListRelationTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceListRelation::truncate()
            ->create([	'id' => '1', 	'resource_list' => '1', 	'relation' => '1', 													])
            ->create([	'id' => '2', 	'resource_list' => '3', 	'relation' => '11', 													])
            ->create([	'id' => '3', 	'resource_list' => '3', 	'relation' => '8', 													])
            ->create([	'id' => '4', 	'resource_list' => '4', 	'relation' => '19', 													])
            ->create([	'id' => '5', 	'resource_list' => '5', 	'relation' => '25', 													])
            ->create([	'id' => '6', 	'resource_list' => '6', 	'relation' => '30', 													])
            ->create([	'id' => '7', 	'resource_list' => '7', 	'relation' => '42', 													])
            ->create([	'id' => '8', 	'resource_list' => '8', 	'relation' => '59', 	'nest_relation1' => '42', 												])
            ->create([	'id' => '9', 	'resource_list' => '9', 	'relation' => '39', 													])
            ->create([	'id' => '10', 	'resource_list' => '9', 	'relation' => '40', 													])
            ->create([	'id' => '11', 	'resource_list' => '9', 	'relation' => '60', 													])
            ->create([	'id' => '12', 	'resource_list' => '10', 	'relation' => '61', 													])
            ->create([	'id' => '13', 	'resource_list' => '10', 	'relation' => '62', 													])
            ->create([	'id' => '14', 	'resource_list' => '10', 	'relation' => '63', 													])
            ->create([	'id' => '15', 	'resource_list' => '11', 	'relation' => '64', 													])
            ->create([	'id' => '16', 	'resource_list' => '11', 	'relation' => '65', 													])
            ->create([	'id' => '17', 	'resource_list' => '12', 	'relation' => '66', 													])
            ->create([	'id' => '18', 	'resource_list' => '12', 	'relation' => '67', 													])
            ->create([	'id' => '19', 	'resource_list' => '13', 	'relation' => '68', 													])
            ->create([	'id' => '20', 	'resource_list' => '13', 	'relation' => '69', 													])
            ->create([	'id' => '21', 	'resource_list' => '14', 	'relation' => '70', 													])
            ->create([	'id' => '22', 	'resource_list' => '14', 	'relation' => '71', 													])
            ->create([	'id' => '23', 	'resource_list' => '14', 	'relation' => '72', 													])
            ->create([	'id' => '24', 	'resource_list' => '15', 	'relation' => '73', 													])
            ->create([	'id' => '25', 	'resource_list' => '15', 	'relation' => '74', 													])
            ->create([	'id' => '26', 	'resource_list' => '16', 	'relation' => '75', 													])
            ->create([	'id' => '27', 	'resource_list' => '23', 	'relation' => '3', 													])
            ->create([	'id' => '28', 	'resource_list' => '25', 	'relation' => '13', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
