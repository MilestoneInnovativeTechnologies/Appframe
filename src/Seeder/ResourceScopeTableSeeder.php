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
            ->create([	'id' => '1', 	'resource' => '1', 	'name' => 'AdministratorsScope', 	'description' => 'Users where has group Administrator', 	'method' => 'administrators', 											])
            ->create([	'id' => '2', 	'resource' => '1', 	'name' => 'DevelopersScope', 	'description' => 'Users where has group Developers', 	'method' => 'developers', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
