<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormFieldDependTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceFormFieldDepend::truncate()
            ->create([	'form_field' => '176', 	'depend_field' => 'resource_list', 	'db_field' => 'resource', 	'operator' => '=', 				'ignore_null' => 'Yes', 								])
            ->create([	'form_field' => '127', 	'depend_field' => 'resource_form', 	'db_field' => 'resource', 	'operator' => '=', 	'compare_method' => 'formResource', 			'ignore_null' => 'Yes', 								])
            ->create([	'form_field' => '128', 	'depend_field' => 'collection_form', 	'db_field' => 'resource_form', 	'operator' => 'In', 				'ignore_null' => 'Yes', 								])
            ->create([	'form_field' => '54', 	'depend_field' => 'method_type', 				'method' => 'id1List', 		'ignore_null' => 'Yes', 								])
            ->create([	'form_field' => '54', 	'depend_field' => 'resource', 						'ignore_null' => 'Yes', 								])
            ->create([	'form_field' => '55', 	'depend_field' => 'method_type', 				'method' => 'id2List', 		'ignore_null' => 'Yes', 								])
            ->create([	'form_field' => '55', 	'depend_field' => 'resource', 						'ignore_null' => 'Yes', 								])
            ->create([	'form_field' => '55', 	'depend_field' => 'idn1', 						'ignore_null' => 'Yes', 								])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
