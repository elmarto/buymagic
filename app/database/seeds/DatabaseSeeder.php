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
	}

}
?>