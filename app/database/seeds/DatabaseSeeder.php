<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call('ProductTableSeeder');
        $this->command->info('Product table seeded!');
		$this->call('ProductPricesTableSeeder');
        $this->command->info('ProductPrices table seeded!');
        $this->call('UserTableSeeder');
        $this->command->info('User table seeded!');
        $this->call('OrderTableSeeder');
        $this->command->info('Order table seeded!');
        $this->call('OrderProductTableSeeder');
        $this->command->info('OrderProduct table seeded!');

	}

}
?>