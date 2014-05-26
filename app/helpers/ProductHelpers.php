<?php
class ProductHelpers {
    public static function getPrice($quantity,$prices) {
    	$price=0;
    	$quantity=floatval($quantity);
    	for($i=0; $i<count($prices)-1; $i++){

    		if(floatval($prices[$i]['quantity'])<=$quantity && floatval($prices[$i+1]['quantity'])>$quantity){
    			$price=$prices[$i]['value'];
    			return floatval($price);
    		}else{
    			$price=$prices[$i+1]['value'];
    		}
    		
    	}
        return floatval($price);
    }
}