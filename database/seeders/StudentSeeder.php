<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Student::factory()->count(40)->create();
        \DB::table('students')->insert([
            [
                'id' => 1,
                'name' => 'Md. Sarwar Hossain',
                'roll' => '17CSE016',
                'email' => 'sarwar.cse4.bu@gmail.com',
                'session' => '2016-17',
                'address' => 'Nachole-6310, Chapainawabgonj',
                'department_id' => 1,
                'batch_id' => 4,
            ],[
                'id' => 2,
                'name' => 'Md. Wasim',
                'roll' => '16CSE006',
                'email' => 'wasim.cse3.bu@gmail.com',
                'session' => '2015-16',
                'address' => 'Chapai-Sadar-6300, Chapainawabgonj',
                'department_id' => 1,
                'batch_id' => 3,
            ],
        ]);
    }
}
