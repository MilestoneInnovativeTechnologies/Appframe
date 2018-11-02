<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormCollectionTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceFormCollection::truncate()
            ->create([	'resource_form' => '12', 	'collection_form' => '13', 	'relation' => '14', 	'foreign_field' => '61', 												])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
