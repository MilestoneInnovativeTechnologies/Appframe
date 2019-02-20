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
            ->create([	'id' => '1', 	'form_field' => '8', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'title', 	'preload' => 'Yes', 									])
            ->create([	'id' => '2', 	'form_field' => '13', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'title', 	'preload' => 'Yes', 									])
            ->create([	'id' => '3', 	'form_field' => '22', 	'type' => 'Enum', 													])
            ->create([	'id' => '4', 	'form_field' => '23', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'name', 	'preload' => 'Yes', 									])
            ->create([	'id' => '5', 	'form_field' => '28', 	'type' => 'Enum', 													])
            ->create([	'id' => '6', 	'form_field' => '29', 	'type' => 'Method', 	'detail' => 'id1List', 			'preload' => 'No', 									])
            ->create([	'id' => '7', 	'form_field' => '30', 	'type' => 'Method', 	'detail' => 'id2List', 			'preload' => 'No', 									])
            ->create([	'id' => '8', 	'form_field' => '31', 	'type' => 'Method', 	'detail' => 'id3List', 			'preload' => 'No', 									])
            ->create([	'id' => '9', 	'form_field' => '37', 	'type' => 'Enum', 													])
            ->create([	'id' => '10', 	'form_field' => '38', 	'type' => 'Method', 	'detail' => 'id1List', 												])
            ->create([	'id' => '11', 	'form_field' => '39', 	'type' => 'Method', 	'detail' => 'id2List', 												])
            ->create([	'id' => '12', 	'form_field' => '40', 	'type' => 'Method', 	'detail' => 'id3List', 												])
            ->create([	'id' => '13', 	'form_field' => '41', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'name', 	'preload' => 'Yes', 									])
            ->create([	'id' => '14', 	'form_field' => '55', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'name', 	'preload' => 'Yes', 									])
            ->create([	'id' => '15', 	'form_field' => '57', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'name', 	'preload' => 'Yes', 									])
            ->create([	'id' => '16', 	'form_field' => '69', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'name', 	'preload' => 'Yes', 									])
            ->create([	'id' => '17', 	'form_field' => '83', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'title', 										])
            ->create([	'id' => '18', 	'form_field' => '84', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'name', 										])
            ->create([	'id' => '19', 	'form_field' => '85', 	'type' => 'Enum', 													])
            ->create([	'id' => '20', 	'form_field' => '86', 	'type' => 'List', 	'detail' => '3', 	'value_attr' => 'id', 	'label_attr' => 'name', 										])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
