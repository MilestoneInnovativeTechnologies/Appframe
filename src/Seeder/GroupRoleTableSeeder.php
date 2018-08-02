<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class GroupRoleTableSeeder extends Seeder
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
        \Milestone\Appframe\GroupRole::truncate()
            ->create([	'group' => '1',	'role' => '1',														])
            ->create([	'group' => '2',	'role' => '2',														])
            ->create([	'group' => '3',	'role' => '3',														])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
