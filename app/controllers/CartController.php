<?php

class CartController extends \BaseController {

	public function set(){
		$storedProducts=Session::get('user.cart');

		$pid=Input::get('pid');
		$quantity=Input::get('quantity');

		$newProduct = array(
		    "pid" => $pid,
		    "quantity" => $quantity
		);

		$found=false;
		if($storedProducts && count($storedProducts)>0){

			for ($i=0; $i<count($storedProducts); $i++){
				if($storedProducts[$i]['pid']==$pid){
					$storedProducts[$i]['quantity']+=$quantity;
					if ($storedProducts[$i]['quantity']<0) 
						$storedProducts[$i]['quantity']=0;
					$found=true;
				}
			}

			if(!$found){
				array_push($storedProducts,$newProduct);
			}
		}else{
			$storedProducts=array();
			array_push($storedProducts,$newProduct);
		}

		Session::put('user.cart', $storedProducts);

		return Session::get('user.cart');
	}

	public function get(){	
		return Session::get('user.cart');
	}
}

?>