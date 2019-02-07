<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormDefaultTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceFormDefault::truncate()
            ->create([	'id' => '1', 	'resource_form' => '1', 	'name' => 'groups', 	'value' => '3', 	'relation' => '1', 											])
            ->create([	'id' => '2', 	'resource_form' => '2', 	'name' => 'groups', 	'value' => '2', 	'relation' => '1', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
