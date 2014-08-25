<?php

class CartController extends \BaseController {

	public function set(){
		$storedProducts	= Session::get('user.cart');

		$pid			= Input::get('pid');
		$quantity 		= Input::get('quantity');
		$action 		= Input::get('action');

		$newProduct = array(
		    "pid" 		=> $pid,
		    "quantity" 	=> $quantity
		);

		$found=false;
		if($storedProducts && count($storedProducts)>0){

			for ($i=0; $i<count($storedProducts); $i++){
				if($storedProducts[$i]['pid']==$pid){
					if($action=='add')
						$storedProducts[$i]['quantity']+=$quantity;
					else if ($action=='set')
						$storedProducts[$i]['quantity']=$quantity;
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

		return $this->get();
	}

	public function get(){	
		$storedProducts	=Session::get('user.cart');
		$ids 			= array();

		$cart = array(
			'products'	=> array(),
			'subtotal'	=> 0
		);

		if(isset($storedProducts)){
			foreach($storedProducts as $product){
				array_push($ids, $product['pid']);
			}

			$products = Product::whereIn('id',$ids)->with('prices')->get();

			for ($i=0; $i<count($products); $i++){
				$product=$products[$i];

				$price_unit = ProductHelpers::getPrice($storedProducts[$i]['quantity'],$product->prices);
				$element = (object)array(
					'id' 			=> $product->id,
					'codename' 		=> $product->codename,
					'name'			=> $product->name,
					'type'			=> $product->type,
					'stock'			=> $product->stock,
					'quantity'		=> (int) $storedProducts[$i]['quantity'],
					'price_unit'	=> $price_unit,
					'price_quantity'=> $price_unit*$storedProducts[$i]['quantity']
				);

				$cart['subtotal']+=$element->price_quantity;
				array_push($cart['products'], $element);
			}
		}
		//print_r (array_keys($products));
		return $cart;
	}

	public function flush(){
		Session::flush();
	}
}

?>