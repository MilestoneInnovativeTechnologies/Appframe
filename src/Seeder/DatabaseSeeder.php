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
        $this->call([
            GroupTableSeeder::class,
            GroupUserTableSeeder::class,
            RoleTableSeeder::class,
            GroupRoleTableSeeder::class,
            ResourceTableSeeder::class,
            ResourceScopeTableSeeder::class,
            ResourceRelationTableSeeder::class,
            ResourceDataTableSeeder::class,
            ResourceDataRelationTableSeeder::class,
            ResourceDataScopeTableSeeder::class,
            ResourceDataViewSectionTableSeeder::class,
            ResourceDataViewSectionItemTableSeeder::class,
            ResourceListTableSeeder::class,
            ResourceListRelationTableSeeder::class,
            ResourceListScopeTableSeeder::class,
            ResourceListLayoutTableSeeder::class,
            ResourceFormTableSeeder::class,
            ResourceFormDefaultTableSeeder::class,
            ResourceDefaultTableSeeder::class,
            ResourceActionTableSeeder::class,
            ResourceActionAttrTableSeeder::class,
            ResourceActionMethodTableSeeder::class,
            ResourceActionListTableSeeder::class,
            ResourceActionDataTableSeeder::class,
            ResourceRoleTableSeeder::class,
            ResourceFormFieldTableSeeder::class,
            ResourceFormFieldAttrTableSeeder::class,
            ResourceFormFieldDataTableSeeder::class,
            ResourceFormFieldValidationTableSeeder::class,
            ResourceFormFieldOptionTableSeeder::class,
            ResourceFormLayoutTableSeeder::class,
            ResourceFormCollectionTableSeeder::class,
            OrganisationTableSeeder::class,
            OrganisationContactTableSeeder::class,
        ]);
    }
}
