<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceDataViewSectionTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceDataViewSection::truncate()
            ->create([	'resource_data' => '1', 				'colspan' => '12', 											])
            ->create([	'resource_data' => '2', 				'colspan' => '12', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
