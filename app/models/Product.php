<?php

class Product extends Eloquent {
	protected $table = "products";
	public $prices = null;

	public function prices(){
		return $this->hasMany('ProductPrice','pid');
	}
}


?>