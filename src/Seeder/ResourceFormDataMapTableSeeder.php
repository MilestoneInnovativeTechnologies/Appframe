<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormDataMapTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceFormDataMap::truncate()
            ->create([	'id' => '1', 	'resource_form' => '2', 	'resource_data' => '1', 	'form_field' => '7', 		'relation' => '1', 										])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
