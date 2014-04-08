<?php

class ProductPricesTableSeeder extends Seeder {

	public function run()
    {
        DB::table('product_price')->truncate();

        DB::table('product_price')->insert(
            array(
                array(
                    'pid' => '1',
                    'quantity' => '1',
                    'value' => '52.99'
                ),
                array(
                    'pid' => '1',
                    'quantity' => '16',
                    'value' => '50.99'
                ),
                array(
                    'pid' => '1',
                    'quantity' => '36',
                    'value' => '48.99'
                ),
                array(
                    'pid' => '2',
                    'quantity' => '1',
                    'value' => '52.99'
                ),
                array(
                    'pid' => '2',
                    'quantity' => '16',
                    'value' => '50.99'
                ),
                array(
                    'pid' => '2',
                    'quantity' => '36',
                    'value' => '48.99'
                )
            )
        );
/*
$table->increments('id');
            $table->integer('pid')->references('id')->on('products');;
            $table->integer('quantity');
            $table->float('price');
            $table->float('promoPrice');
*/
      
    }

}
?>