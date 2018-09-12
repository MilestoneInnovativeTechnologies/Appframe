<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormFieldAttrTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceFormFieldAttr::truncate()
            ->create([	'form_field' => '34', 	'name' => 'inline', 	'value' => '3', 													])
            ->create([	'form_field' => '35', 	'name' => 'inline', 	'value' => '3', 													])
            ->create([	'form_field' => '36', 	'name' => 'inline', 	'value' => '3', 													])
            ->create([	'form_field' => '37', 	'name' => 'inline', 	'value' => '3', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
