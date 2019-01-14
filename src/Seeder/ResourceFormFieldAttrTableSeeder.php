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
            ->create([	'id' => '1', 	'form_field' => '5', 	'name' => 'inline', 	'value' => '5', 												])
            ->create([	'id' => '2', 	'form_field' => '6', 	'name' => 'inline', 	'value' => '5', 												])
            ->create([	'id' => '3', 	'form_field' => '7', 	'name' => 'inline', 	'value' => '5', 												])
            ->create([	'id' => '4', 	'form_field' => '8', 	'name' => 'inline', 	'value' => '4', 												])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
