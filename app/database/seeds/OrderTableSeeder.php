<?php

class OrderTableSeeder extends Seeder {

	public function run()
    {
        DB::table('orders')->truncate();

        DB::table('orders')->insert(
            array(
                array(
                    'uid' => 1
                ),
                array(
                    'uid' => 2
                )
            )
        );
    }

}