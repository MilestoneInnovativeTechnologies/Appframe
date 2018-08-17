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
        \Milestone\Appframe\ResourceFormDefault::truncate()
            ->create([	'resource_form' => '2', 	'name' => 'group', 	'value' => '3', 	'relation' => '2', 												])
            ->create([	'resource_form' => '3', 	'name' => 'group', 	'value' => '2', 	'relation' => '2', 												])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
