<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceDataViewSectionItemTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceDataViewSectionItem::truncate()
            ->create([	'section' => '1', 	'label' => 'Name', 	'attribute' => 'name', 													])
            ->create([	'section' => '1', 	'label' => 'Email', 	'attribute' => 'email', 													])
            ->create([	'section' => '1', 	'label' => 'Groups', 	'attribute' => 'title', 	'relation' => '1', 												])
            ->create([	'section' => '2', 	'label' => 'Name', 	'attribute' => 'name', 													])
            ->create([	'section' => '2', 	'label' => 'Email', 	'attribute' => 'email', 													])
            ->create([	'section' => '3', 	'label' => 'Group', 	'attribute' => 'title', 													])
            ->create([	'section' => '3', 	'label' => 'Description', 	'attribute' => 'description', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
