<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('batches')->insert([
            [
                'id' => 1,
                'name' => '1st',
                'session' => '2013-14',
                'department_id' => 1,
            ],[
                'id' => 2,
                'name' => '2nd',
                'session' => '2014-15',
                'department_id' => 1,
            ],[
                'id' => 3,
                'name' => '3rd',
                'session' => '2015-16',
                'department_id' => 1,
            ],[
                'id' => 4,
                'name' => '4th',
                'session' => '2016-17',
                'department_id' => 1,
            ],
        ]);
    }
}
