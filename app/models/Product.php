<?php

class Product extends Eloquent {
	protected $table = "products";
	protected $fillable = array('name', 'type', 'summary');

	public function countProducts(){
		return $this->hasMany('Products');
	}
}


?>