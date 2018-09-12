<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormFieldDataTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceFormFieldData::truncate()
            ->create([	'form_field' => '1', 	'attribute' => 'name', 														])
            ->create([	'form_field' => '2', 	'attribute' => 'email', 														])
            ->create([	'form_field' => '3', 		'relation' => '1', 													])
            ->create([	'form_field' => '4', 	'attribute' => 'name', 														])
            ->create([	'form_field' => '5', 	'attribute' => 'email', 														])
            ->create([	'form_field' => '6', 	'attribute' => 'name', 														])
            ->create([	'form_field' => '7', 	'attribute' => 'email', 														])
            ->create([	'form_field' => '8', 	'attribute' => 'name', 														])
            ->create([	'form_field' => '9', 	'attribute' => 'description', 														])
            ->create([	'form_field' => '10', 	'attribute' => 'title', 														])
            ->create([	'form_field' => '11', 	'attribute' => 'name', 														])
            ->create([	'form_field' => '12', 	'attribute' => 'description', 														])
            ->create([	'form_field' => '13', 	'attribute' => 'title', 														])
            ->create([	'form_field' => '14', 	'attribute' => 'name', 														])
            ->create([	'form_field' => '15', 	'attribute' => 'description', 														])
            ->create([	'form_field' => '16', 	'attribute' => 'title', 														])
            ->create([	'form_field' => '17', 	'attribute' => 'namespace', 														])
            ->create([	'form_field' => '18', 	'attribute' => 'table', 														])
            ->create([	'form_field' => '19', 	'attribute' => 'key', 														])
            ->create([	'form_field' => '20', 	'attribute' => 'controller', 														])
            ->create([	'form_field' => '21', 	'attribute' => 'controller_namespace', 														])
            ->create([	'form_field' => '22', 	'attribute' => 'name', 														])
            ->create([	'form_field' => '23', 	'attribute' => 'name_short', 														])
            ->create([	'form_field' => '24', 	'attribute' => 'name_long', 														])
            ->create([	'form_field' => '25', 	'attribute' => 'address_line1', 														])
            ->create([	'form_field' => '26', 	'attribute' => 'address_line2', 														])
            ->create([	'form_field' => '27', 	'attribute' => 'address_short', 														])
            ->create([	'form_field' => '28', 	'attribute' => 'address_long', 														])
            ->create([	'form_field' => '29', 	'attribute' => 'type', 	'relation' => '11', 													])
            ->create([	'form_field' => '30', 	'attribute' => 'type_name', 	'relation' => '11', 													])
            ->create([	'form_field' => '31', 	'attribute' => 'detail', 	'relation' => '11', 													])
            ->create([	'form_field' => '32', 	'attribute' => 'password', 														])
            ->create([	'form_field' => '33', 	'attribute' => 'password', 														])
            ->create([	'form_field' => '34', 	'attribute' => 'name', 														])
            ->create([	'form_field' => '35', 	'attribute' => 'email', 														])
            ->create([	'form_field' => '36', 	'attribute' => 'name', 														])
            ->create([	'form_field' => '37', 	'attribute' => 'email', 														])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
