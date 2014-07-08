<?php

class CheckoutController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$mpClientId = "7444";
		$mpSecretId = "tRJ1ATI3zhw2FMTaH1ncPGtGG162Uwei";

		$mp = new MP($mpClientId,$mpSecretId);


		//Create an items array that fetch session saved products
		//for MP usage
		$items = [];
		$cart =  (new CartController)->get()['products'][0]->name;
		foreach((new CartController)->get()['products'] as $item) {
			array_push($items, array(
				"title" => $item->type.' - '.$item->name,
	            "quantity" => $item->quantity,
	            "currency_id" => "ARG",
	            "unit_price" => $item->price_unit
			));
		}


		//Preference for MP instance
		$preference = array (
		    "items" => $items
		);

		$preferenceResult = $mp->create_preference($preference);
		
		return $preferenceResult['response'];

		
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
