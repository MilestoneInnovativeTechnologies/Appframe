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
        \Milestone\Appframe\ResourceActionMethod::truncate()
            ->create([	'resource_action' => '1', 	'type' => 'Form', 	'idn1' => '1', 													])
            ->create([	'resource_action' => '2', 	'type' => 'Form', 	'idn1' => '2', 													])
            ->create([	'resource_action' => '3', 	'type' => 'Form', 	'idn1' => '3', 													])
            ->create([	'resource_action' => '4', 	'type' => 'List', 	'idn1' => '1', 													])
            ->create([	'resource_action' => '5', 	'type' => 'List', 	'idn1' => '2', 													])
            ->create([	'resource_action' => '6', 	'type' => 'List', 	'idn1' => '3', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
