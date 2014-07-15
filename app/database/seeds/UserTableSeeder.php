<?php

class UserTableSeeder extends Seeder {

	public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert(
            array(
                array(
                    'email'     => 'el.marto.mail@gmail.com',
                    'password'  => Hash::make('escuta'),
                    'name'      => 'Martín',
                    'lastname'  => 'Sacco',
                    'address'   => 'Pumacahua 1452, Capital Federal',
                    'avatarUrl' => 'img/products/theros-booster-pack.png',
                    'role'      => 'admin'
                ),
                array(
                    'email' 	=> 'juanito@test.com',
                    'password' 	=> Hash::make('asdfasdf'),
                    'name' 		=> 'Juanito',
                    'lastname' 	=> 'Fernandez',
                    'address'   => 'Rivadavia 3992, Capital Federal',
                    'avatarUrl' => 'img/products/theros-booster-pack.png',
                    'role'      => 'buyer'
                ),
                array(
                    'email' 	=> 'pablogimenez@test.com',
                    'password' 	=> Hash::make('asdfasdf'),
                    'name' 		=> 'Pablo',
                    'lastname' 	=> 'Gimenez',
                    'address'   => 'Chacabuco 688, Capital Federal',
                    'avatarUrl' => 'img/products/theros-booster-pack.png',
                    'role'      => 'buyer'
                )                
            )
        );
    }

}
?>