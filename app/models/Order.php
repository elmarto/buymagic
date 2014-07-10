<?php

class Order extends Eloquent {
	protected $table = "orders";

	public function products(){
		return $this->hasMany('OrderProducts','pid');
	}
}