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
        \Milestone\Appframe\ResourceData::truncate()
            ->create([	'resource' => '1', 	'name' => 'ViewAdministrator', 	'description' => 'Record of user administrator', 	'title_field' => 'name', 												])
            ->create([	'resource' => '1', 	'name' => 'ViewDeveloper', 	'description' => 'Record of user developer', 	'title_field' => 'name', 												])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
