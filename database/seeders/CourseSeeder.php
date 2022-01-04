<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('courses')->insert([
            [
                'id' => 1,
                'name' => 'Computer Networks',
                'code' => 'CSE-3205',
            ],[
                'id' => 2,
                'name' => 'Computer Networks Lab.',
                'code' => 'CSE-3206',
            ],
        ]);
    }
}
