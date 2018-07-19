<?php

use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
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
        Milestone\Appframe\Group::truncate()
            ->create([	'name' => 'setup_user',	'description' => 'Users created initially to setup Module',	'title' => 'Setup Users',													])
            ->create([	'name' => 'developers',	'description' => 'Users in this group are responsible to build this module',	'title' => 'Developers',													])
            ->create([	'name' => 'administrators',	'description' => 'Administrators are responsible for managing users, groups, roles and their resources',	'title' => 'Administrators',													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
