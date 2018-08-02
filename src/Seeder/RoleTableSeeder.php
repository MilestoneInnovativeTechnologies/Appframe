<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
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
        \Milestone\Appframe\Role::truncate()
            ->create([	'name' => 'developer_administrator',	'description' => 'Have access to Developer and Administrators',	'title' => 'Developer Administrator',													])
            ->create([	'name' => 'developer',	'description' => 'Access to resource creation',	'title' => 'Developer',													])
            ->create([	'name' => 'administator',	'description' => 'Have access to Manage Users, Roles and assign Resources',	'title' => 'Administrator',													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
