<?php

class ProductListController extends \BaseController {

	public function get($pid=null){
		if($pid){
			return Product::where('codename',$pid)->with('prices')->get();
		}else{
			return Product::with('prices')->get();
		}
	}
}