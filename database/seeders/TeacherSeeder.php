<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('admin_panels')->insert([
            [
                'id' => 1,
                'name' => 'Dr. Manjur Ahmed',
                'dept' => 'CSE',
                'email' => 'majur@gmail.com',
                'password' => bcrypt('12345678'),
                'contact' => '01975412512'
            ],[
                'id' => 2,
                'name' => 'Md. Samsuddhoa',
                'dept' => 'CSE',
                'email' => 'sams@gmail.com',
                'password' => bcrypt('12345678'),
                'contact' => '01975412513'
            ],[
                'id' => 3,
                'name' => 'Md. Erfan',
                'dept' => 'CSE',
                'email' => 'erfan@gmail.com',
                'password' => bcrypt('12345678'),
                'contact' => '01975412514'
            ],
        ]);
    }
}
