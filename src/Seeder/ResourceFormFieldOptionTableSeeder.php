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
            ->create([	'id' => '1', 	'form_field' => '2', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'title', 	'preload' => 'Yes', 									])
            ->create([	'id' => '2', 	'form_field' => '7', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'title', 	'preload' => 'Yes', 									])
            ->create([	'id' => '3', 	'form_field' => '16', 	'type' => 'Enum', 													])
            ->create([	'id' => '4', 	'form_field' => '17', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'name', 	'preload' => 'Yes', 									])
            ->create([	'id' => '5', 	'form_field' => '22', 	'type' => 'Enum', 													])
            ->create([	'id' => '6', 	'form_field' => '23', 	'type' => 'Method', 	'detail' => 'id1List', 			'preload' => 'No', 									])
            ->create([	'id' => '7', 	'form_field' => '24', 	'type' => 'Method', 	'detail' => 'id2List', 			'preload' => 'No', 									])
            ->create([	'id' => '8', 	'form_field' => '30', 	'type' => 'Enum', 													])
            ->create([	'id' => '9', 	'form_field' => '31', 	'type' => 'Method', 	'detail' => 'id1List', 												])
            ->create([	'id' => '10', 	'form_field' => '32', 	'type' => 'Method', 	'detail' => 'id2List', 												])
            ->create([	'id' => '11', 	'form_field' => '33', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'name', 	'preload' => 'Yes', 									])
            ->create([	'id' => '12', 	'form_field' => '47', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'name', 	'preload' => 'Yes', 									])
            ->create([	'id' => '13', 	'form_field' => '49', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'name', 	'preload' => 'Yes', 									])
            ->create([	'id' => '14', 	'form_field' => '59', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'name', 	'preload' => 'Yes', 									])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
