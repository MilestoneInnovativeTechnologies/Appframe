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
            ->create([	'form_field' => '55', 	'type' => 'hidden-visible', 	'depend_field' => 'method_type', 	'alter_on' => 'value', 		'values' => 'FormWithData,ListRelation', 										])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
