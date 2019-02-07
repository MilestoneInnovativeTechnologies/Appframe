<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceListScopeTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceListScope::truncate()
            ->create([	'id' => '1', 	'resource_list' => '1', 	'scope' => '1', 													])
            ->create([	'id' => '2', 	'resource_list' => '2', 	'scope' => '2', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
