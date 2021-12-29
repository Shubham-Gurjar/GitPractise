<?php

use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


            DB::table('item')->insert([

                [
                    'item_id' => '1',
                    'item_name' => 'Tea',
                    'rate' => '10',
                ],
                [
                    'item_id' => '2',
                    'item_name' => 'Coffee',
                    'rate' => '10',
                ],
                [
                    'item_id' => '3',
                    'item_name' => 'Samosa',
                    'rate' => '15',
                ],
                [
                    'item_id' => '4',
                    'item_name' => 'Cake',
                    'rate' => '15',
                ]

            ]);


    }
}
