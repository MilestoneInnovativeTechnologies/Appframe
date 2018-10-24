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
            ->create([	'resource_action' => '1', 	'type' => 'Form', 		'idn1' => '1', 												])
            ->create([	'resource_action' => '2', 	'type' => 'Form', 		'idn1' => '2', 												])
            ->create([	'resource_action' => '3', 	'type' => 'Form', 		'idn1' => '3', 												])
            ->create([	'resource_action' => '4', 	'type' => 'List', 		'idn1' => '1', 												])
            ->create([	'resource_action' => '5', 	'type' => 'List', 		'idn1' => '2', 												])
            ->create([	'resource_action' => '6', 	'type' => 'List', 		'idn1' => '3', 												])
            ->create([	'resource_action' => '7', 	'type' => 'Data', 		'idn1' => '1', 												])
            ->create([	'resource_action' => '8', 	'type' => 'Data', 		'idn1' => '2', 												])
            ->create([	'resource_action' => '9', 	'type' => 'FormWithData', 		'idn1' => '8', 	'idn2' => '1', 											])
            ->create([	'resource_action' => '10', 	'type' => 'FormWithData', 		'idn1' => '9', 	'idn2' => '2', 											])
            ->create([	'resource_action' => '11', 	'type' => 'Form', 		'idn1' => '10', 												])
            ->create([	'resource_action' => '12', 	'type' => 'Form', 		'idn1' => '11', 												])
            ->create([	'resource_action' => '13', 	'type' => 'Form', 		'idn1' => '12', 												])
            ->create([	'resource_action' => '14', 	'type' => 'Form', 		'idn1' => '13', 												])
            ->create([	'resource_action' => '15', 	'type' => 'Form', 		'idn1' => '14', 												])
            ->create([	'resource_action' => '16', 	'type' => 'Form', 		'idn1' => '15', 												])
            ->create([	'resource_action' => '17', 	'type' => 'Form', 		'idn1' => '16', 												])
            ->create([	'resource_action' => '18', 	'type' => 'Form', 		'idn1' => '17', 												])
            ->create([	'resource_action' => '19', 	'type' => 'Form', 		'idn1' => '18', 												])
            ->create([	'resource_action' => '20', 	'type' => 'Form', 		'idn1' => '19', 												])
            ->create([	'resource_action' => '21', 	'type' => 'Form', 		'idn1' => '20', 												])
            ->create([	'resource_action' => '22', 	'type' => 'Form', 		'idn1' => '21', 												])
            ->create([	'resource_action' => '23', 	'type' => 'Form', 		'idn1' => '22', 												])
            ->create([	'resource_action' => '24', 	'type' => 'Form', 		'idn1' => '23', 												])
            ->create([	'resource_action' => '25', 	'type' => 'Form', 		'idn1' => '24', 												])
            ->create([	'resource_action' => '26', 	'type' => 'Form', 		'idn1' => '25', 												])
            ->create([	'resource_action' => '27', 	'type' => 'Form', 		'idn1' => '26', 												])
            ->create([	'resource_action' => '28', 	'type' => 'Form', 		'idn1' => '27', 												])
            ->create([	'resource_action' => '29', 	'type' => 'Form', 		'idn1' => '28', 												])
            ->create([	'resource_action' => '30', 	'type' => 'Form', 		'idn1' => '29', 												])
            ->create([	'resource_action' => '31', 	'type' => 'Form', 		'idn1' => '30', 												])
            ->create([	'resource_action' => '32', 	'type' => 'Form', 		'idn1' => '31', 												])
            ->create([	'resource_action' => '33', 	'type' => 'Form', 		'idn1' => '32', 												])
            ->create([	'resource_action' => '34', 	'type' => 'Form', 		'idn1' => '33', 												])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
