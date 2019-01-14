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
            ->create([	'id' => '1', 	'resource_form' => '8', 	'collection_form' => '9', 	'relation' => '15', 	'foreign_field' => '43', 											])
            ->create([	'id' => '2', 	'resource_form' => '7', 	'collection_form' => '9', 	'relation' => '15', 	'foreign_field' => '43', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
