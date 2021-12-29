<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

                  DB::table('users')->insert([

                      [
                        'name' => 'Ram',
                        'email' => 'ram@italent.com',
                        'password' => bcrypt('facebook'),
                      ],
                      [
                        'name' => 'Shyam',
                        'email' => 'shyam@italent.com',
                        'password' => bcrypt('facebook'),
                      ],
                      [
                        'name' => 'Ghanshyam',
                        'email' => 'ghanshyam@italent.com',
                        'password' => bcrypt('facebook'),
                      ]

                  ]);
    }
}
