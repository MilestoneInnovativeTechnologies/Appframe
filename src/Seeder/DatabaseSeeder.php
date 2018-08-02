<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            GroupTableSeeder::class,
            GroupUserTableSeeder::class,
            RoleTableSeeder::class,
            GroupRoleTableSeeder::class,
            ResourceTableSeeder::class,
            ResourceRoleTableSeeder::class,
            ResourceScopeTableSeeder::class,
            ResourceRelationTableSeeder::class,
            ResourceDataTableSeeder::class,
            ResourceDataRelationTableSeeder::class,
            ResourceListTableSeeder::class,
            ResourceListRelationTableSeeder::class,
            ResourceListScopeTableSeeder::class,
            ResourceFormTableSeeder::class,
            ResourceFormDefaultTableSeeder::class,
            ResourceDefaultTableSeeder::class,
            ResourceActionTableSeeder::class,
            ResourceActionAttrTableSeeder::class,
            ResourceActionMethodTableSeeder::class,
            ResourceActionListTableSeeder::class,
            ResourceActionDataTableSeeder::class,
            ResourceFormFieldTableSeeder::class,
            ResourceFormFieldAttrTableSeeder::class,
            ResourceFormFieldDataTableSeeder::class,
            ResourceFormFieldValidationTableSeeder::class,
            OrganisationTableSeeder::class,
            OrganisationContactTableSeeder::class
        ]);
    }
}
