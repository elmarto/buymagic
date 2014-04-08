<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPricesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_price', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('pid')->references('id')->on('products');;
			$table->integer('quantity');
			$table->decimal('value',5,2);
			$table->decimal('promoValue',5,2);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_price');
	}

}
