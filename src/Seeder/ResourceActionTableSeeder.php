<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceActionTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceAction::truncate()
            ->create([	'id' => '1', 	'resource' => '1', 	'name' => 'NewUserFormAction', 	'description' => 'Action to call a form to create a new user', 	'title' => 'New User', 	'type' => 'primary', 	'menu' => 'Create User', 									])
            ->create([	'id' => '2', 	'resource' => '1', 	'name' => 'UsersListAction', 	'description' => 'Action to list all users', 	'title' => 'Users', 	'type' => 'primary', 	'menu' => 'All Users', 									])
            ->create([	'id' => '3', 	'resource' => '1', 	'name' => 'EditUserAction', 	'description' => 'Action to update a user', 	'title' => 'Edit User', 	'type' => 'primary', 										])
            ->create([	'id' => '4', 	'resource' => '1', 	'name' => 'ChangeUserPasswordAction', 	'description' => 'Action to call a form to change user password', 	'title' => 'Change Password', 	'type' => 'primary', 										])
            ->create([	'id' => '5', 	'resource' => '4', 	'name' => 'NewResourceFormAction', 	'description' => 'Action to call a form to create a new resource', 	'title' => 'New Resource', 		'menu' => 'Create Resource', 									])
            ->create([	'id' => '6', 	'resource' => '4', 	'name' => 'ResourcesListAction', 	'description' => 'Action to list all resources', 	'title' => 'Resources', 		'menu' => 'Resources', 									])
            ->create([	'id' => '7', 	'resource' => '30', 	'name' => 'NewActionAction', 	'description' => 'Action to call a for to create new action', 	'title' => 'Create Action', 		'menu' => 'New Action', 									])
            ->create([	'id' => '8', 	'resource' => '30', 	'name' => 'AddActionAction', 	'description' => 'List action to call a form which adds a new action to a selected resource', 	'title' => 'Add Action', 	'type' => 'primary', 										])
            ->create([	'id' => '9', 	'resource' => '30', 	'name' => 'ActionsListAction', 	'description' => 'Action to list all actions', 			'menu' => 'List All', 									])
            ->create([	'id' => '10', 	'resource' => '8', 	'name' => 'NewFormAction', 	'description' => 'Action to create a new form', 	'title' => 'New Form', 		'menu' => 'New Form', 									])
            ->create([	'id' => '11', 	'resource' => '8', 	'name' => 'FormsListAction', 	'description' => 'Action to list all forms', 			'menu' => 'List All', 									])
            ->create([	'id' => '12', 	'resource' => '4', 	'name' => 'AddNewFormAction', 	'description' => 'Add a form to a resource', 	'title' => 'Add Form', 	'type' => 'primary', 										])
            ->create([	'id' => '13', 	'resource' => '20', 	'name' => 'CreateListFormAction', 	'description' => 'Action to call a form to create a list', 	'title' => 'Create List', 		'menu' => 'New List', 									])
            ->create([	'id' => '14', 	'resource' => '20', 	'name' => 'ListsListAction', 	'description' => 'Action to list all lists', 			'menu' => 'List All', 									])
            ->create([	'id' => '15', 	'resource' => '20', 	'name' => 'AddListFormAction', 	'description' => 'List action to call a form which adds a new list to the selected resource', 	'title' => 'Add List', 	'type' => 'primary', 										])
            ->create([	'id' => '16', 	'resource' => '25', 	'name' => 'CreateDataFormAction', 	'description' => 'Action to call a from to create a data', 	'title' => 'Create Data', 		'menu' => 'New Data', 									])
            ->create([	'id' => '17', 	'resource' => '25', 	'name' => 'DataListAction', 	'description' => 'Action to list all data', 			'menu' => 'List All', 									])
            ->create([	'id' => '18', 	'resource' => '25', 	'name' => 'AddDataFormAction', 	'description' => 'List action to call a form which adds a new data to the selected resource', 	'title' => 'Add Data', 	'type' => 'primary', 										])
            ->create([	'id' => '19', 	'resource' => '4', 	'name' => 'ListResourceFormsAction', 	'description' => 'List all forms of a selected resource', 	'title' => 'View Forms', 	'type' => 'primary', 										])
            ->create([	'id' => '20', 	'resource' => '4', 	'name' => 'ListResourceListsAction', 	'description' => 'List all lists of a selected resource', 	'title' => 'View Lists', 	'type' => 'primary', 										])
            ->create([	'id' => '21', 	'resource' => '4', 	'name' => 'ListResourceDataAction', 	'description' => 'List all data of a selected resource', 	'title' => 'View Data', 	'type' => 'primary', 										])
            ->create([	'id' => '22', 	'resource' => '4', 	'name' => 'ListResourceActionsAction', 	'description' => 'List all actions of a selected resource', 	'title' => 'View Actions', 	'type' => 'primary', 										])
            ->create([	'id' => '23', 	'resource' => '8', 	'name' => 'ListFormFieldsAction', 	'description' => 'Action to list all fields of a selected form', 	'title' => 'View Fields', 	'type' => 'primary', 										])
            ->create([	'id' => '24', 	'resource' => '8', 	'name' => 'ListFormLayoutsAction', 	'description' => 'Action to list all layouts of a selected form', 	'title' => 'View Layout', 	'type' => 'primary', 										])
            ->create([	'id' => '25', 	'resource' => '8', 	'name' => 'ListFormCollectionsAction', 	'description' => 'Action to list all collections of a selected form', 	'title' => 'View Collections', 	'type' => 'primary', 										])
            ->create([	'id' => '26', 	'resource' => '20', 	'name' => 'ListListRelationAction', 	'description' => 'Action to list all relations of a selected list', 	'title' => 'View Relations', 	'type' => 'primary', 										])
            ->create([	'id' => '27', 	'resource' => '20', 	'name' => 'ListListScopesAction', 	'description' => 'Action to list all scopes of a selected list', 	'title' => 'View Scopes', 	'type' => 'primary', 										])
            ->create([	'id' => '28', 	'resource' => '20', 	'name' => 'ListListLayoutAction', 	'description' => 'Action to list layout details of a selected list', 	'title' => 'View Layout Fields', 	'type' => 'primary', 										])
            ->create([	'id' => '29', 	'resource' => '20', 	'name' => 'ListListSearchAction', 	'description' => 'Action to list all search field of a selected list', 	'title' => 'View Search Fields', 	'type' => 'primary', 										])
            ->create([	'id' => '30', 	'resource' => '25', 	'name' => 'ListDataRelationsAction', 	'description' => 'Action to list all relations of a selected data', 	'title' => 'View Relations', 	'type' => 'primary', 										])
            ->create([	'id' => '31', 	'resource' => '25', 	'name' => 'ListDataScopesAction', 	'description' => 'Action to list all scopes of a selected data', 	'title' => 'View Scopes', 	'type' => 'primary', 										])
            ->create([	'id' => '32', 	'resource' => '25', 	'name' => 'ListDataSectionsAction', 	'description' => 'Action to list all sections of a selected data', 	'title' => 'View Sections', 	'type' => 'primary', 										])
            ->create([	'id' => '33', 	'resource' => '25', 	'name' => 'ListDataActionsAction', 	'description' => 'Action to list all actions of a selected data', 	'title' => 'View Actions', 	'type' => 'primary', 										])
            ->create([	'id' => '34', 	'resource' => '30', 	'name' => 'ListActionAttrsAction', 	'description' => 'Action to list all attributes of a selected action', 	'title' => 'View Attributes', 	'type' => 'primary', 										])
            ->create([	'id' => '35', 	'resource' => '30', 	'name' => 'ListActionListsAction', 	'description' => 'Action to list all list of a selected action', 	'title' => 'View Lists', 	'type' => 'primary', 										])
            ->create([	'id' => '36', 	'resource' => '30', 	'name' => 'ListActionDataAction', 	'description' => 'Action to list all data of a selected action', 	'title' => 'View Data', 	'type' => 'primary', 										])
            ->create([	'id' => '37', 	'resource' => '9', 	'name' => 'ListFieldAttrs', 	'description' => 'Action to list all attrs of a selected field', 	'title' => 'View Attributes', 	'type' => 'primary', 										])
            ->create([	'id' => '38', 	'resource' => '9', 	'name' => 'ListFieldOptions', 	'description' => 'Action to list all options of a selected field', 	'title' => 'View Options', 	'type' => 'primary', 										])
            ->create([	'id' => '39', 	'resource' => '9', 	'name' => 'ListFieldValidations', 	'description' => 'Action to list all validations of a selected field', 	'title' => 'View Validations', 	'type' => 'primary', 										])
            ->create([	'id' => '40', 	'resource' => '9', 	'name' => 'ListFieldDepends', 	'description' => 'Action to list all depends of a selected field', 	'title' => 'View Depends', 	'type' => 'primary', 										])
            ->create([	'id' => '41', 	'resource' => '9', 	'name' => 'ListFieldDynamics', 	'description' => 'Action to list all dynamics of a selected field', 	'title' => 'View Dynamics', 	'type' => 'primary', 										])
            ->create([	'id' => '42', 	'resource' => '20', 	'name' => 'AddListActionsAction', 	'description' => 'Action to manage Actions assigned to a list', 	'title' => 'Manage Actions', 	'type' => 'primary', 										])
            ->create([	'id' => '43', 	'resource' => '2', 	'name' => 'CreateGroupAction', 	'description' => 'Action to create a new group', 	'title' => 'New Group', 		'menu' => 'New Group', 									])
            ->create([	'id' => '44', 	'resource' => '2', 	'name' => 'ListGroupsAction', 	'description' => 'Action to lists all groups', 	'title' => 'Groups', 		'menu' => 'Groups', 									])
            ->create([	'id' => '45', 	'resource' => '3', 	'name' => 'CreateRoleAction', 	'description' => 'Action to create a new role', 	'title' => 'New Role', 		'menu' => 'New Role', 									])
            ->create([	'id' => '46', 	'resource' => '3', 	'name' => 'ListRolesAction', 	'description' => 'Action to list all roles', 	'title' => 'Roles', 		'menu' => 'Roles', 									])
            ->create([	'id' => '47', 	'resource' => '2', 	'name' => 'ManageRolesAction', 	'description' => 'Action to manage roles for a group', 	'title' => 'Add/Remove Roles', 	'type' => 'primary', 										])
            ->create([	'id' => '48', 	'resource' => '3', 	'name' => 'ManageGroupAction', 	'description' => 'Action to manage groups of a role', 	'title' => 'Add/Remove Groups', 	'type' => 'primary', 										])
            ->create([	'id' => '49', 	'resource' => '3', 	'name' => 'AddRoleResource', 	'description' => 'Action to add a resource', 	'title' => 'Add Resource', 	'type' => 'primary', 										])
            ->create([	'id' => '50', 	'resource' => '3', 	'name' => 'ListRoleResources', 	'description' => 'Action to list all resources of a role', 	'title' => 'List Resources', 	'type' => 'primary', 										])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
