<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceScopeTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceScope::truncate()
            ->create([	'id' => '1', 	'resource' => '1', 	'name' => 'SetupUser', 	'description' => 'Filter users which are maintained by Setup user only', 	'method' => 'setupUser', 											])
            ->create([	'id' => '2', 	'resource' => '1', 	'name' => 'AdministratorUser', 	'description' => 'Filter users which are maintained by Administrator user', 	'method' => 'administratorUser', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
