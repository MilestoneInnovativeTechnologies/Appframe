<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class OrganisationTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\Organisation::truncate()
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
