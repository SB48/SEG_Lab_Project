<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocietyRulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $ruleTable = DB::table('society_rules');
        $ruleTable->insert([
            'society_rule' => 'rentalPeriod',
            'ruleVal' => 2
        ]);
        $ruleTable->insert([
            'society_rule' => 'extensionTime',
            'ruleVal' => 2
        ]);
        $ruleTable->insert([
            'society_rule' => 'gracePeriod',
            'ruleVal' => 52
        ]);
        $ruleTable->insert([
            'society_rule' => 'numExtensions',
            'ruleVal' => 2
        ]);
        $ruleTable->insert([
            'society_rule' => 'rentalLimit',
            'ruleVal' => 2
        ]);
        $ruleTable->insert([
            'society_rule' => 'numViolationsForBan',
            'ruleVal' => 3
        ]);
        $ruleTable->insert([
            'society_rule' => 'lengthOfBan',
            'ruleVal' => 6
        ]);
    }
}
