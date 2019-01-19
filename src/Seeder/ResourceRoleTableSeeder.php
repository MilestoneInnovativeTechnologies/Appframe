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
            ->create([	'id' => '1', 	'resource' => '1', 	'role' => '1', 													])
            ->create([	'id' => '2', 	'resource' => '4', 	'role' => '2', 													])
            ->create([	'id' => '3', 	'resource' => '6', 	'role' => '2', 													])
            ->create([	'id' => '4', 	'resource' => '7', 	'role' => '2', 													])
            ->create([	'id' => '5', 	'resource' => '8', 	'role' => '2', 													])
            ->create([	'id' => '6', 	'resource' => '9', 	'role' => '2', 													])
            ->create([	'id' => '7', 	'resource' => '10', 	'role' => '2', 													])
            ->create([	'id' => '8', 	'resource' => '11', 	'role' => '2', 													])
            ->create([	'id' => '9', 	'resource' => '12', 	'role' => '2', 													])
            ->create([	'id' => '10', 	'resource' => '13', 	'role' => '2', 													])
            ->create([	'id' => '11', 	'resource' => '14', 	'role' => '2', 													])
            ->create([	'id' => '12', 	'resource' => '15', 	'role' => '2', 													])
            ->create([	'id' => '13', 	'resource' => '16', 	'role' => '2', 													])
            ->create([	'id' => '14', 	'resource' => '17', 	'role' => '2', 													])
            ->create([	'id' => '15', 	'resource' => '18', 	'role' => '2', 													])
            ->create([	'id' => '16', 	'resource' => '19', 	'role' => '2', 													])
            ->create([	'id' => '17', 	'resource' => '20', 	'role' => '2', 													])
            ->create([	'id' => '18', 	'resource' => '21', 	'role' => '2', 													])
            ->create([	'id' => '19', 	'resource' => '22', 	'role' => '2', 													])
            ->create([	'id' => '20', 	'resource' => '23', 	'role' => '2', 													])
            ->create([	'id' => '21', 	'resource' => '24', 	'role' => '2', 													])
            ->create([	'id' => '22', 	'resource' => '25', 	'role' => '2', 													])
            ->create([	'id' => '23', 	'resource' => '26', 	'role' => '2', 													])
            ->create([	'id' => '24', 	'resource' => '27', 	'role' => '2', 													])
            ->create([	'id' => '25', 	'resource' => '28', 	'role' => '2', 													])
            ->create([	'id' => '26', 	'resource' => '29', 	'role' => '2', 													])
            ->create([	'id' => '27', 	'resource' => '30', 	'role' => '2', 													])
            ->create([	'id' => '28', 	'resource' => '31', 	'role' => '2', 													])
            ->create([	'id' => '29', 	'resource' => '32', 	'role' => '2', 													])
            ->create([	'id' => '30', 	'resource' => '33', 	'role' => '2', 													])
            ->create([	'id' => '31', 	'resource' => '34', 	'role' => '2', 													])
            ->create([	'id' => '32', 	'resource' => '35', 	'role' => '2', 													])
            ->create([	'id' => '33', 	'resource' => '36', 	'role' => '2', 													])
            ->create([	'id' => '34', 	'resource' => '37', 	'role' => '2', 													])
            ->create([	'id' => '35', 	'resource' => '38', 	'role' => '2', 													])
            ->create([	'id' => '36', 	'resource' => '39', 	'role' => '2', 													])
            ->create([	'id' => '37', 	'resource' => '1', 	'role' => '3', 													])
            ->create([	'id' => '38', 	'resource' => '2', 	'role' => '3', 													])
            ->create([	'id' => '39', 	'resource' => '3', 	'role' => '3', 													])
            ->create([	'id' => '40', 	'resource' => '5', 	'role' => '3', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
