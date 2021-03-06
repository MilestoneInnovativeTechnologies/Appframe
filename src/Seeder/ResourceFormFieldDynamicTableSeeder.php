<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormFieldDynamicTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceFormFieldDynamic::truncate()
            ->create([	'id' => '1', 	'form_field' => '30', 	'type' => 'disabled-enabled', 	'depend_field' => 'type', 	'alter_on' => 'value', 		'values' => 'FormWithData,AddRelation,ListRelation,ManageRelation', 	'operator' => 'In', 								])
            ->create([	'id' => '2', 	'form_field' => '31', 	'type' => 'disabled-enabled', 	'depend_field' => 'type', 	'alter_on' => 'value', 		'values' => 'AddRelation', 	'operator' => '=', 								])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
