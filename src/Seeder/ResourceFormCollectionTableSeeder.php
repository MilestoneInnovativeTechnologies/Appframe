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
            ->create([	'id' => '1', 	'resource_form' => '10', 	'collection_form' => '11', 	'relation' => '15', 	'foreign_field' => '49', 											])
            ->create([	'id' => '2', 	'resource_form' => '9', 	'collection_form' => '11', 	'relation' => '15', 	'foreign_field' => '49', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
