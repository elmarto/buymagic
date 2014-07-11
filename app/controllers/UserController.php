<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return User::all();
	}

	
	public function login()
	{
		//Auth::login(UserInterface $user, $remember = false);
		$email =  strtolower(Input::get('email'));
		/*User::create([
		        'email' => $email,
		        'password' => Hash::make(Input::get('password')),
		        ]);*/

		$user = User::where('email', '=', $email)->first();
		
		Auth::login($user, true);

		if(Auth::check())
			return array('success'=>true,  'email' => Auth::user()->email, 'name' => Auth::user()->name );
		else
			return array('success'=>false);
	}

	public function isLogged()
	{
		return Auth::check();
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
