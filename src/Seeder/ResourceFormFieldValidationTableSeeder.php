<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormFieldValidationTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceFormFieldValidation::truncate()
            ->create([	'id' => '1', 	'form_field' => '67', 	'rule' => 'required', 	'message' => 'Group name cannot be empty', 												])
            ->create([	'id' => '2', 	'form_field' => '68', 	'rule' => 'required', 	'message' => 'Group title cannot be empty', 												])
            ->create([	'id' => '3', 	'form_field' => '70', 	'rule' => 'required', 	'message' => 'Group name cannot be empty', 												])
            ->create([	'id' => '4', 	'form_field' => '71', 	'rule' => 'required', 	'message' => 'Group title cannot be empty', 												])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
