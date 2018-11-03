<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormFieldOptionTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceFormFieldOption::truncate()
            ->create([	'form_field' => '45', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'title', 											])
            ->create([	'form_field' => '49', 	'type' => 'Enum', 														])
            ->create([	'form_field' => '53', 	'type' => 'Enum', 														])
            ->create([	'form_field' => '56', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'title', 											])
            ->create([	'form_field' => '61', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'title', 											])
            ->create([	'form_field' => '65', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'method', 											])
            ->create([	'form_field' => '66', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'method', 											])
            ->create([	'form_field' => '68', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'label', 											])
            ->create([	'form_field' => '71', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'label', 											])
            ->create([	'form_field' => '72', 	'type' => 'Enum', 														])
            ->create([	'form_field' => '76', 	'type' => 'Enum', 														])
            ->create([	'form_field' => '77', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'label', 											])
            ->create([	'form_field' => '85', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'title', 											])
            ->create([	'form_field' => '90', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'name', 											])
            ->create([	'form_field' => '91', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'title', 											])
            ->create([	'form_field' => '175', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'title', 											])
            ->create([	'form_field' => '176', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'method', 											])
            ->create([	'form_field' => '177', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'method', 											])
            ->create([	'form_field' => '178', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'method', 											])
            ->create([	'form_field' => '179', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'method', 											])
            ->create([	'form_field' => '180', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'method', 											])
            ->create([	'form_field' => '181', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'method', 											])
            ->create([	'form_field' => '92', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'title', 											])
            ->create([	'form_field' => '99', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'title', 											])
            ->create([	'form_field' => '103', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'name', 											])
            ->create([	'form_field' => '104', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'title', 											])
            ->create([	'form_field' => '182', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'name', 											])
            ->create([	'form_field' => '183', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'method', 											])
            ->create([	'form_field' => '184', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'method', 											])
            ->create([	'form_field' => '185', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'method', 											])
            ->create([	'form_field' => '186', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'method', 											])
            ->create([	'form_field' => '187', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'method', 											])
            ->create([	'form_field' => '188', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'method', 											])
            ->create([	'form_field' => '105', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'title', 											])
            ->create([	'form_field' => '108', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'method', 											])
            ->create([	'form_field' => '109', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'method', 											])
            ->create([	'form_field' => '110', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'title', 											])
            ->create([	'form_field' => '111', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'title', 											])
            ->create([	'form_field' => '116', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'name', 											])
            ->create([	'form_field' => '119', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'method', 											])
            ->create([	'form_field' => '121', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'title', 											])
            ->create([	'form_field' => '124', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'method', 											])
            ->create([	'form_field' => '125', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'title', 											])
            ->create([	'form_field' => '126', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'title', 											])
            ->create([	'form_field' => '127', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'method', 											])
            ->create([	'form_field' => '128', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'label', 											])
            ->create([	'form_field' => '115', 	'type' => 'Enum', 														])
            ->create([	'form_field' => '129', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'title', 											])
            ->create([	'form_field' => '131', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'method', 											])
            ->create([	'form_field' => '132', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'method', 											])
            ->create([	'form_field' => '133', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'method', 											])
            ->create([	'form_field' => '134', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'label', 											])
            ->create([	'form_field' => '137', 	'type' => 'Enum', 														])
            ->create([	'form_field' => '141', 	'type' => 'Enum', 														])
            ->create([	'form_field' => '142', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'title', 											])
            ->create([	'form_field' => '147', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'title', 											])
            ->create([	'form_field' => '151', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'name', 											])
            ->create([	'form_field' => '154', 	'type' => 'Enum', 														])
            ->create([	'form_field' => '157', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'title', 											])
            ->create([	'form_field' => '159', 	'type' => 'Enum', 														])
            ->create([	'form_field' => '160', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'title', 											])
            ->create([	'form_field' => '161', 	'type' => 'Enum', 														])
            ->create([	'form_field' => '163', 	'type' => 'Enum', 														])
            ->create([	'form_field' => '168', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'label', 											])
            ->create([	'form_field' => '169', 	'type' => 'Enum', 														])
            ->create([	'form_field' => '171', 	'type' => 'Enum', 														])
            ->create([	'form_field' => '174', 	'type' => 'Enum', 														])
            ->create([	'form_field' => '54', 	'type' => 'method', 	'detail' => 'id1List', 			'preload' => 'Yes', 										])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
