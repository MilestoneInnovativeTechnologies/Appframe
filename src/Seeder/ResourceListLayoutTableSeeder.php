<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceListLayoutTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceListLayout::truncate()
            ->create([	'resource_list' => '2', 	'label' => 'Name', 	'field' => 'name', 													])
            ->create([	'resource_list' => '2', 	'label' => 'Email', 	'field' => 'email', 													])
            ->create([	'resource_list' => '3', 	'label' => 'Name', 	'field' => 'name', 													])
            ->create([	'resource_list' => '3', 	'label' => 'Email', 	'field' => 'email', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
