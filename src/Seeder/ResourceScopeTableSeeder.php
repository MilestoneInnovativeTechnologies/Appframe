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
            ->create([	'resource' => '1',	'name' => 'Administrators',	'description' => 'List of users of administrator group',	'method' => 'administrators',												])
            ->create([	'resource' => '1',	'name' => 'Developers',	'description' => 'List all users of developer group',	'method' => 'developers',												])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
