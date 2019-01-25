<?php

namespace Milestone\Appframe\Seeder;

use Illuminate\Database\Seeder;

class ResourceListLayoutTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceListLayout::truncate()
            ->create([	'id' => '1', 	'resource_list' => '1', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '2', 	'resource_list' => '1', 	'label' => 'Email', 	'field' => 'email', 												])
            ->create([	'id' => '3', 	'resource_list' => '1', 	'label' => 'Groups', 	'field' => 'title', 	'relation' => '1', 											])
            ->create([	'id' => '4', 	'resource_list' => '2', 	'label' => 'ID', 	'field' => 'id', 												])
            ->create([	'id' => '5', 	'resource_list' => '2', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '6', 	'resource_list' => '2', 	'label' => 'Title', 	'field' => 'title', 												])
            ->create([	'id' => '7', 	'resource_list' => '3', 	'label' => 'ID', 	'field' => 'id', 												])
            ->create([	'id' => '8', 	'resource_list' => '3', 	'label' => 'Resource', 	'field' => 'name', 	'relation' => '11', 											])
            ->create([	'id' => '9', 	'resource_list' => '3', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '10', 	'resource_list' => '3', 	'label' => 'Title', 	'field' => 'title', 												])
            ->create([	'id' => '11', 	'resource_list' => '3', 	'label' => 'Menu', 	'field' => 'menu', 												])
            ->create([	'id' => '12', 	'resource_list' => '3', 	'label' => 'Type', 	'field' => 'type', 	'relation' => '8', 											])
            ->create([	'id' => '13', 	'resource_list' => '4', 	'label' => 'ID', 	'field' => 'id', 												])
            ->create([	'id' => '14', 	'resource_list' => '4', 	'label' => 'Resource', 	'field' => 'name', 	'relation' => '19', 											])
            ->create([	'id' => '15', 	'resource_list' => '4', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '16', 	'resource_list' => '4', 	'label' => 'Title', 	'field' => 'title', 												])
            ->create([	'id' => '17', 	'resource_list' => '5', 	'label' => 'ID', 	'field' => 'id', 												])
            ->create([	'id' => '18', 	'resource_list' => '5', 	'label' => 'Resource', 	'field' => 'name', 	'relation' => '25', 											])
            ->create([	'id' => '19', 	'resource_list' => '5', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '20', 	'resource_list' => '5', 	'label' => 'Title', 	'field' => 'title', 												])
            ->create([	'id' => '21', 	'resource_list' => '5', 	'label' => 'Identity Field', 	'field' => 'identity', 												])
            ->create([	'id' => '22', 	'resource_list' => '5', 	'label' => 'Per Page', 	'field' => 'items_per_page', 												])
            ->create([	'id' => '23', 	'resource_list' => '6', 	'label' => 'ID', 	'field' => 'id', 												])
            ->create([	'id' => '24', 	'resource_list' => '6', 	'label' => 'Resource', 	'field' => 'name', 	'relation' => '30', 											])
            ->create([	'id' => '25', 	'resource_list' => '6', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '26', 	'resource_list' => '6', 	'label' => 'Title Field', 	'field' => 'title_field', 												])
            ->create([	'id' => '27', 	'resource_list' => '7', 	'label' => 'Form', 	'field' => 'name', 	'relation' => '42', 											])
            ->create([	'id' => '28', 	'resource_list' => '7', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '29', 	'resource_list' => '7', 	'label' => 'Type', 	'field' => 'type', 												])
            ->create([	'id' => '30', 	'resource_list' => '7', 	'label' => 'Label', 	'field' => 'label', 												])
            ->create([	'id' => '31', 	'resource_list' => '8', 	'label' => 'Form', 	'field' => 'name', 	'relation' => '59', 	'nest_relation1' => '42', 										])
            ->create([	'id' => '32', 	'resource_list' => '8', 	'label' => 'Field', 	'field' => 'name', 	'relation' => '59', 											])
            ->create([	'id' => '33', 	'resource_list' => '8', 	'label' => 'Colspan', 	'field' => 'colspan', 												])
            ->create([	'id' => '34', 	'resource_list' => '9', 	'label' => 'Collection Form', 	'field' => 'name', 	'relation' => '39', 											])
            ->create([	'id' => '35', 	'resource_list' => '9', 	'label' => 'Relation', 	'field' => 'name', 	'relation' => '40', 											])
            ->create([	'id' => '36', 	'resource_list' => '9', 	'label' => 'Foreign Field', 	'field' => 'label', 	'relation' => '60', 											])
            ->create([	'id' => '37', 	'resource_list' => '9', 	'label' => 'Foreign Field Name', 	'field' => 'name', 	'relation' => '60', 											])
            ->create([	'id' => '38', 	'resource_list' => '9', 	'label' => 'Foreign Field Type', 	'field' => 'type', 	'relation' => '60', 											])
            ->create([	'id' => '39', 	'resource_list' => '10', 	'label' => 'List', 	'field' => 'name', 	'relation' => '61', 											])
            ->create([	'id' => '40', 	'resource_list' => '10', 	'label' => 'Relation', 	'field' => 'name', 	'relation' => '62', 											])
            ->create([	'id' => '41', 	'resource_list' => '10', 	'label' => 'Nest Relation', 	'field' => 'name', 	'relation' => '63', 											])
            ->create([	'id' => '42', 	'resource_list' => '11', 	'label' => 'List', 	'field' => 'name', 	'relation' => '64', 											])
            ->create([	'id' => '43', 	'resource_list' => '11', 	'label' => 'Scope', 	'field' => 'name', 	'relation' => '65', 											])
            ->create([	'id' => '44', 	'resource_list' => '12', 	'label' => 'List', 	'field' => 'name', 	'relation' => '66', 											])
            ->create([	'id' => '45', 	'resource_list' => '12', 	'label' => 'Label', 	'field' => 'label', 												])
            ->create([	'id' => '46', 	'resource_list' => '12', 	'label' => 'Field', 	'field' => 'field', 												])
            ->create([	'id' => '47', 	'resource_list' => '12', 	'label' => 'Relation', 	'field' => 'name', 	'relation' => '67', 											])
            ->create([	'id' => '48', 	'resource_list' => '13', 	'label' => 'List', 	'field' => 'name', 	'relation' => '68', 											])
            ->create([	'id' => '49', 	'resource_list' => '13', 	'label' => 'Field', 	'field' => 'field', 												])
            ->create([	'id' => '50', 	'resource_list' => '13', 	'label' => 'Relation', 	'field' => 'name', 	'relation' => '69', 											])
            ->create([	'id' => '51', 	'resource_list' => '14', 	'label' => 'Data', 	'field' => 'name', 	'relation' => '70', 											])
            ->create([	'id' => '52', 	'resource_list' => '14', 	'label' => 'Relation', 	'field' => 'name', 	'relation' => '71', 											])
            ->create([	'id' => '53', 	'resource_list' => '14', 	'label' => 'Deep Relation', 	'field' => 'name', 	'relation' => '72', 											])
            ->create([	'id' => '54', 	'resource_list' => '15', 	'label' => 'Data', 	'field' => 'name', 	'relation' => '73', 											])
            ->create([	'id' => '55', 	'resource_list' => '15', 	'label' => 'Scope', 	'field' => 'name', 	'relation' => '74', 											])
            ->create([	'id' => '56', 	'resource_list' => '16', 	'label' => 'Data', 	'field' => 'name', 	'relation' => '75', 											])
            ->create([	'id' => '57', 	'resource_list' => '16', 	'label' => 'Title', 	'field' => 'title', 												])
            ->create([	'id' => '58', 	'resource_list' => '16', 	'label' => 'Title Field', 	'field' => 'title_field', 												])
            ->create([	'id' => '59', 	'resource_list' => '16', 	'label' => 'Relation', 	'field' => 'name', 	'relation' => '35', 											])
            ->create([	'id' => '60', 	'resource_list' => '16', 	'label' => 'Colspan', 	'field' => 'colspan', 												])
            ->create([	'id' => '61', 	'resource_list' => '17', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '62', 	'resource_list' => '17', 	'label' => 'Value', 	'field' => 'value', 												])
            ->create([	'id' => '63', 	'resource_list' => '18', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '64', 	'resource_list' => '18', 	'label' => 'Value', 	'field' => 'value', 												])
            ->create([	'id' => '65', 	'resource_list' => '19', 	'label' => 'Type', 	'field' => 'type', 												])
            ->create([	'id' => '66', 	'resource_list' => '19', 	'label' => 'Method', 	'field' => 'detail', 												])
            ->create([	'id' => '67', 	'resource_list' => '19', 	'label' => 'Value Attribute', 	'field' => 'value_attr', 												])
            ->create([	'id' => '68', 	'resource_list' => '19', 	'label' => 'Label Attribute', 	'field' => 'label_attr', 												])
            ->create([	'id' => '69', 	'resource_list' => '19', 	'label' => 'Preload', 	'field' => 'preload', 												])
            ->create([	'id' => '70', 	'resource_list' => '20', 	'label' => 'Rule', 	'field' => 'rule', 												])
            ->create([	'id' => '71', 	'resource_list' => '20', 	'label' => 'Message', 	'field' => 'message', 												])
            ->create([	'id' => '72', 	'resource_list' => '20', 	'label' => 'Argument 1', 	'field' => 'arg1', 												])
            ->create([	'id' => '73', 	'resource_list' => '20', 	'label' => 'Argument 2', 	'field' => 'arg2', 												])
            ->create([	'id' => '74', 	'resource_list' => '20', 	'label' => 'Argument 3', 	'field' => 'arg3', 												])
            ->create([	'id' => '75', 	'resource_list' => '21', 	'label' => 'Depend On Field', 	'field' => 'depend_field', 												])
            ->create([	'id' => '76', 	'resource_list' => '21', 	'label' => 'Database Field', 	'field' => 'db_field', 												])
            ->create([	'id' => '77', 	'resource_list' => '21', 	'label' => 'Operator', 	'field' => 'operator', 												])
            ->create([	'id' => '78', 	'resource_list' => '21', 	'label' => 'Compare Operator', 	'field' => 'compare_method', 												])
            ->create([	'id' => '79', 	'resource_list' => '21', 	'label' => 'Method Name', 	'field' => 'method', 												])
            ->create([	'id' => '80', 	'resource_list' => '21', 	'label' => 'Value DB Field', 	'field' => 'value_db_field', 												])
            ->create([	'id' => '81', 	'resource_list' => '21', 	'label' => 'Ignore on Null', 	'field' => 'ignore_null', 												])
            ->create([	'id' => '82', 	'resource_list' => '22', 	'label' => 'Dynamic Type', 	'field' => 'type', 												])
            ->create([	'id' => '83', 	'resource_list' => '22', 	'label' => 'Depend On Field', 	'field' => 'depend_field', 												])
            ->create([	'id' => '84', 	'resource_list' => '22', 	'label' => 'Alter On', 	'field' => 'alter_on', 												])
            ->create([	'id' => '85', 	'resource_list' => '22', 	'label' => 'Value', 	'field' => 'value', 												])
            ->create([	'id' => '86', 	'resource_list' => '22', 	'label' => 'Values', 	'field' => 'values', 												])
            ->create([	'id' => '87', 	'resource_list' => '22', 	'label' => 'Operator', 	'field' => 'operator', 												])
            ->create([	'id' => '88', 	'resource_list' => '23', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '89', 	'resource_list' => '23', 	'label' => 'Title', 	'field' => 'title', 												])
            ->create([	'id' => '90', 	'resource_list' => '23', 	'label' => 'Roles', 	'field' => 'title', 	'relation' => '3', 											])
            ->create([	'id' => '91', 	'resource_list' => '24', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '92', 	'resource_list' => '24', 	'label' => 'Title', 	'field' => 'title', 												])
            ->create([	'id' => '93', 	'resource_list' => '25', 	'label' => 'Resource', 	'field' => 'name', 	'relation' => '13', 											])
            ->create([	'id' => '94', 	'resource_list' => '25', 	'label' => 'Action Availability', 	'field' => 'actions_availability', 												])
            ->create([	'id' => '95', 	'resource_list' => '25', 	'label' => 'Actions', 	'field' => 'actions', 												])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
