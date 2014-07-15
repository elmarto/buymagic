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
		$email = strtolower(Input::get('email'));
		$user = User::where('email', '=', $email)->first();

		if(isset($user)){
			Auth::login($user, true);
			return	$this->isLogged();
		}else{
			return array('success'=>false);
		}
		
	}

	public function isLogged()
	{
		if(Auth::check()){
			$user=Auth::user();
			$user_data = array('email' => $user->email, 'name' => $user->name, 'role' => $user->role);
			return array('success'=>true, 'user' => $user_data);
		}else{
			return array('success'=>false);
		}
	}

	public function logout()
	{
		Auth::logout();
		return array('success'=>true);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$user = new User;

	    $user->email = Input::get('email');
	    $user->password = Hash::make(Input::get('password'));
	    $user->name = Input::get('name');
	    $user->lastname = Input::get('lastname');
	    $user->address = Input::get('address');

	    $user->save();

	    Auth::login($user, true);

		return	$this->isLogged();
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
