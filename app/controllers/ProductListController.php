<?php

class ProductListController extends \BaseController {

	public function get($pid=null){
		if($pid)
			return Product::where('codename',$pid)->get();
		else
			return Product::all();
	}
}