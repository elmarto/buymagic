<?php

class ProductTableSeeder extends Seeder {

	public function run()
    {
        DB::table('products')->truncate();

        DB::table('products')->insert(
            array(
                array(
                    'codename' => 'theros-booster-pack',
                    'name' => 'Theros',
                    'type' => 'Booster Pack',
                    'description' => 'Much more text',
                    'summary' => 'First Theros Block',
                    'imageUrl' => 'img/products/theros-booster-pack.png',
                    'stock' => 20,
                    'status' => 'a'
                ),
                array(
                    'codename' => 'born-of-the-gods-booster-pack',
                    'name' => 'Born of the Gods',
                    'type' => 'Booster Pack',
                    'description' => 'Much more text',
                    'summary' => 'Second Theros Block',
                    'imageUrl' => 'img/products/born-of-the-gods-booster-pack.png',
                    'stock' => 20,
                    'status' => 'a'
                )
            )
        );

        /*Product::create(array(
        	'name' => 'Born of the Gods',
        	'type' => 'Booster Pack',
            'description' => 'Much more text',
        	'summary' => 'Second Theros Block',
        	'imageUrl' => 'img/products/born-of-the-gods-booster.pack.gif',
        	'stock' => 20,
        	'status' => 'a'
        ));*/
    }

}
?>