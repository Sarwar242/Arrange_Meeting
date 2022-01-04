<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('departments')->insert([
            [
                'id' => 1,
                'name' => 'CSE',
                'faculty' => 'Science and Engineering',
            ],[
                'id' => 2,
                'name' => 'Math',
                'faculty' => 'Science and Engineering',
            ],[
                'id' => 3,
                'name' => 'Physics',
                'faculty' => 'Science and Engineering',
            ],
        ]);
    }
}
