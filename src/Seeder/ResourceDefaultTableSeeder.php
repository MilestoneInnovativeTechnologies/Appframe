<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceDefaultTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceDefault::truncate()
            ->create([	'id' => '1', 	'resource' => '4', 	'list' => '20', 	'create' => '5', 												])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
