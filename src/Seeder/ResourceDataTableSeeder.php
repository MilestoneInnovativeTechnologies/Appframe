<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceDataTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceData::truncate()
            ->create([	'id' => '1', 	'resource' => '1', 	'name' => 'UserDetailsData', 	'description' => 'View details of a user', 	'title_field' => 'name', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
