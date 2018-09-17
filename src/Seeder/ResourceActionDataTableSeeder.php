<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceActionDataTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceActionData::truncate()
            ->create([	'resource_action' => '9', 	'resource_data' => '1', 														])
            ->create([	'resource_action' => '10', 	'resource_data' => '2', 														])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
