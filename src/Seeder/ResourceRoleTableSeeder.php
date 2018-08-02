<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceRoleTableSeeder extends Seeder
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
        \Milestone\Appframe\ResourceRole::truncate()
            ->create([	'resource' => '1',	'role' => '1',	'actions_availability' => 'Only',	'actions' => '2,3,5,6',												])
            ->create([	'resource' => '1',	'role' => '3',														])
            ->create([	'resource' => '2',	'role' => '3',														])
            ->create([	'resource' => '3',	'role' => '3',														])
            ->create([	'resource' => '4',	'role' => '2',														])
            ->create([	'resource' => '5',	'role' => '1',														])
            ->create([	'resource' => '5',	'role' => '3',														])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);

    }
}
