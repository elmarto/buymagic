<?php

class OrderTableSeeder extends Seeder {

	public function run()
    {
        DB::table('orders')->truncate();

        DB::table('orders')->insert(
            array(
                array(
                    'uid' => 2
                ),
                array(
                    'uid' => 3
                )
            )
        );
    }

}