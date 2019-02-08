<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceActionListTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceActionList::truncate()
            ->create([	'id' => '1', 	'resource_action' => '6', 	'resource_list' => '1', 													])
            ->create([	'id' => '2', 	'resource_action' => '7', 	'resource_list' => '1', 													])
            ->create([	'id' => '3', 	'resource_action' => '6', 	'resource_list' => '2', 													])
            ->create([	'id' => '4', 	'resource_action' => '7', 	'resource_list' => '2', 													])
            ->create([	'id' => '5', 	'resource_action' => '11', 	'resource_list' => '3', 													])
            ->create([	'id' => '6', 	'resource_action' => '15', 	'resource_list' => '3', 													])
            ->create([	'id' => '7', 	'resource_action' => '18', 	'resource_list' => '3', 													])
            ->create([	'id' => '8', 	'resource_action' => '21', 	'resource_list' => '3', 													])
            ->create([	'id' => '9', 	'resource_action' => '22', 	'resource_list' => '3', 													])
            ->create([	'id' => '10', 	'resource_action' => '23', 	'resource_list' => '3', 													])
            ->create([	'id' => '11', 	'resource_action' => '24', 	'resource_list' => '3', 													])
            ->create([	'id' => '12', 	'resource_action' => '25', 	'resource_list' => '3', 													])
            ->create([	'id' => '13', 	'resource_action' => '26', 	'resource_list' => '5', 													])
            ->create([	'id' => '14', 	'resource_action' => '27', 	'resource_list' => '5', 													])
            ->create([	'id' => '15', 	'resource_action' => '28', 	'resource_list' => '5', 													])
            ->create([	'id' => '16', 	'resource_action' => '29', 	'resource_list' => '6', 													])
            ->create([	'id' => '17', 	'resource_action' => '30', 	'resource_list' => '6', 													])
            ->create([	'id' => '18', 	'resource_action' => '31', 	'resource_list' => '6', 													])
            ->create([	'id' => '19', 	'resource_action' => '32', 	'resource_list' => '6', 													])
            ->create([	'id' => '20', 	'resource_action' => '33', 	'resource_list' => '7', 													])
            ->create([	'id' => '21', 	'resource_action' => '34', 	'resource_list' => '7', 													])
            ->create([	'id' => '22', 	'resource_action' => '35', 	'resource_list' => '7', 													])
            ->create([	'id' => '23', 	'resource_action' => '36', 	'resource_list' => '7', 													])
            ->create([	'id' => '24', 	'resource_action' => '37', 	'resource_list' => '4', 													])
            ->create([	'id' => '25', 	'resource_action' => '38', 	'resource_list' => '4', 													])
            ->create([	'id' => '26', 	'resource_action' => '39', 	'resource_list' => '4', 													])
            ->create([	'id' => '27', 	'resource_action' => '40', 	'resource_list' => '8', 													])
            ->create([	'id' => '28', 	'resource_action' => '41', 	'resource_list' => '8', 													])
            ->create([	'id' => '29', 	'resource_action' => '42', 	'resource_list' => '8', 													])
            ->create([	'id' => '30', 	'resource_action' => '43', 	'resource_list' => '8', 													])
            ->create([	'id' => '31', 	'resource_action' => '44', 	'resource_list' => '8', 													])
            ->create([	'id' => '32', 	'resource_action' => '45', 	'resource_list' => '6', 													])
            ->create([	'id' => '33', 	'resource_action' => '50', 	'resource_list' => '24', 													])
            ->create([	'id' => '34', 	'resource_action' => '51', 	'resource_list' => '25', 													])
            ->create([	'id' => '35', 	'resource_action' => '52', 	'resource_list' => '25', 													])
            ->create([	'id' => '36', 	'resource_action' => '53', 	'resource_list' => '25', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
