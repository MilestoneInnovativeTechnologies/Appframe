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
            ->create([	'id' => '1', 	'form_field' => '29', 	'depend_field' => 'type', 				'method' => 'id1List', 		'ignore_null' => 'Yes', 							])
            ->create([	'id' => '2', 	'form_field' => '29', 	'depend_field' => 'resource', 				'method' => 'id1List', 		'ignore_null' => 'Yes', 							])
            ->create([	'id' => '3', 	'form_field' => '30', 	'depend_field' => 'type', 				'method' => 'id2List', 		'ignore_null' => 'Yes', 							])
            ->create([	'id' => '4', 	'form_field' => '30', 	'depend_field' => 'resource', 				'method' => 'id2List', 		'ignore_null' => 'Yes', 							])
            ->create([	'id' => '5', 	'form_field' => '30', 	'depend_field' => 'idn1', 				'method' => 'id2List', 		'ignore_null' => 'Yes', 							])
            ->create([	'id' => '6', 	'form_field' => '31', 	'depend_field' => 'type', 				'method' => 'id3List', 		'ignore_null' => 'Yes', 							])
            ->create([	'id' => '7', 	'form_field' => '31', 	'depend_field' => 'idn2', 				'method' => 'id3List', 		'ignore_null' => 'Yes', 							])
            ->create([	'id' => '8', 	'form_field' => '38', 	'depend_field' => 'type', 				'method' => 'id1List', 		'ignore_null' => 'Yes', 							])
            ->create([	'id' => '9', 	'form_field' => '38', 	'depend_field' => 'resource', 				'method' => 'id1List', 		'ignore_null' => 'Yes', 							])
            ->create([	'id' => '10', 	'form_field' => '39', 	'depend_field' => 'type', 				'method' => 'id2List', 		'ignore_null' => 'Yes', 							])
            ->create([	'id' => '11', 	'form_field' => '39', 	'depend_field' => 'resource', 				'method' => 'id2List', 		'ignore_null' => 'Yes', 							])
            ->create([	'id' => '12', 	'form_field' => '39', 	'depend_field' => 'idn1', 				'method' => 'id2List', 		'ignore_null' => 'Yes', 							])
            ->create([	'id' => '13', 	'form_field' => '40', 	'depend_field' => 'type', 				'method' => 'id3List', 		'ignore_null' => 'Yes', 							])
            ->create([	'id' => '14', 	'form_field' => '40', 	'depend_field' => 'idn2', 				'method' => 'id3List', 		'ignore_null' => 'Yes', 							])
            ->create([	'id' => '15', 	'form_field' => '55', 	'depend_field' => 'resource', 	'db_field' => 'resource', 	'operator' => '=', 				'ignore_null' => 'Yes', 							])
            ->create([	'id' => '16', 	'form_field' => '86', 	'depend_field' => 'resource', 	'db_field' => 'resource', 	'operator' => '=', 				'ignore_null' => 'Yes', 							])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
