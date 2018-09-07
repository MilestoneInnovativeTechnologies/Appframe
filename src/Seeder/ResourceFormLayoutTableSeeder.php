<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormLayoutTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceFormLayout::truncate()
            ->create([	'resource_form' => '2', 	'form_field' => '4', 	'colspan' => '12', 													])
            ->create([	'resource_form' => '2', 	'form_field' => '5', 	'colspan' => '6', 													])
            ->create([	'resource_form' => '2', 	'form_field' => '32', 	'colspan' => '6', 													])
            ->create([	'resource_form' => '3', 	'form_field' => '6', 	'colspan' => '12', 													])
            ->create([	'resource_form' => '3', 	'form_field' => '7', 	'colspan' => '0', 													])
            ->create([	'resource_form' => '3', 	'form_field' => '33', 	'colspan' => '0', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
