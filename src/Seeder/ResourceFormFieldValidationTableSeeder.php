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
        \Milestone\Appframe\ResourceFormFieldValidation::truncate()
            ->create([	'form_field' => '4', 	'rule' => 'required', 	'message' => 'User name is mandatory', 													])
            ->create([	'form_field' => '5', 	'rule' => 'required', 	'message' => 'User email is mandarory', 													])
            ->create([	'form_field' => '5', 	'rule' => 'email', 	'message' => 'Email should be a valid email address', 													])
            ->create([	'form_field' => '5', 	'rule' => 'unique', 	'message' => 'This email is already taken, please choose a unique one', 	'arg1' => 'users', 	'arg2' => 'email', 											])
            ->create([	'form_field' => '6', 	'rule' => 'required', 	'message' => 'User name is mandatory', 													])
            ->create([	'form_field' => '7', 	'rule' => 'required', 	'message' => 'User email is mandarory', 													])
            ->create([	'form_field' => '7', 	'rule' => 'email', 	'message' => 'Email should be a valid email address', 													])
            ->create([	'form_field' => '7', 	'rule' => 'unique', 	'message' => 'This email is already taken, please choose a unique one', 	'arg1' => 'users', 	'arg2' => 'email', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
