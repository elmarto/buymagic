<?php

class Product extends Eloquent {
	protected $table = "products";

	public function prices(){
		return $this->hasMany('ProductPrice','pid');
	}
}


?>