<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $memberTable = DB::table('members');
        $memberTable->insert([
            'name' => 'Jay Macpherson',
            'dob' => '2015-10-11'
        ]);

        $memberTable->insert([
            'name' => 'Sophie Biber',
            'dob' => '2014-08-09'
        ]);

        $memberTable->insert([
            'name' => 'Abs Washboard',
            'dob' => '2011-06-02'
        ]);

        $memberTable->insert([
            'name' => 'Marta Krawczyk',
            'dob' => '2013-07-12'
        ]);
    }
}
