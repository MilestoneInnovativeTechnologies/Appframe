<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceRoleTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceRole::truncate()
            ->create([	'resource' => '1', 	'role' => '1', 	'actions_availability' => 'Only', 	'actions' => '2,3,5,6,7,8,9,10', 												])
            ->create([	'resource' => '1', 	'role' => '3', 														])
            ->create([	'resource' => '2', 	'role' => '3', 														])
            ->create([	'resource' => '3', 	'role' => '3', 														])
            ->create([	'resource' => '4', 	'role' => '2', 														])
            ->create([	'resource' => '5', 	'role' => '1', 														])
            ->create([	'resource' => '5', 	'role' => '3', 														])
            ->create([	'resource' => '7', 	'role' => '2', 														])
            ->create([	'resource' => '8', 	'role' => '2', 														])
            ->create([	'resource' => '9', 	'role' => '2', 														])
            ->create([	'resource' => '10', 	'role' => '2', 														])
            ->create([	'resource' => '12', 	'role' => '2', 														])
            ->create([	'resource' => '13', 	'role' => '2', 														])
            ->create([	'resource' => '14', 	'role' => '2', 														])
            ->create([	'resource' => '15', 	'role' => '2', 														])
            ->create([	'resource' => '16', 	'role' => '2', 														])
            ->create([	'resource' => '17', 	'role' => '2', 														])
            ->create([	'resource' => '18', 	'role' => '2', 														])
            ->create([	'resource' => '19', 	'role' => '2', 														])
            ->create([	'resource' => '20', 	'role' => '2', 														])
            ->create([	'resource' => '21', 	'role' => '2', 														])
            ->create([	'resource' => '22', 	'role' => '2', 														])
            ->create([	'resource' => '23', 	'role' => '2', 														])
            ->create([	'resource' => '24', 	'role' => '2', 														])
            ->create([	'resource' => '25', 	'role' => '2', 														])
            ->create([	'resource' => '26', 	'role' => '2', 														])
            ->create([	'resource' => '27', 	'role' => '2', 														])
            ->create([	'resource' => '28', 	'role' => '2', 														])
            ->create([	'resource' => '29', 	'role' => '2', 														])
            ->create([	'resource' => '30', 	'role' => '2', 														])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
