<?php

class OrderProductTableSeeder extends Seeder {

	public function run()
    {
        DB::table('order_product')->truncate();

        DB::table('order_product')->insert(
            array(
                array(
                    'oid' 		=> 1,
                    'pid' 		=> 1,
                    'quantity' 	=> 10
                ),
                array(
                    'oid' 		=> 2,
                    'pid' 		=> 2,
                    'quantity' 	=> 15
                )
            )
        );
    }
}