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
                    'avatarUrl' => 'img/products/theros-booster-pack.png',
                    'is_admin'  => true
                ),
                array(
                    'email' 	=> 'juanito@test.com',
                    'password' 	=> Hash::make('asdfasdf'),
                    'name' 		=> 'Juanito',
                    'lastname' 	=> 'Fernandez',
                    'avatarUrl' => 'img/products/theros-booster-pack.png',
                    'is_admin'  => false
                ),
                array(
                    'email' 	=> 'pablogimenez@test.com',
                    'password' 	=> Hash::make('asdfasdf'),
                    'name' 		=> 'Pablo',
                    'lastname' 	=> 'Gimenez',
                    'avatarUrl' => 'img/products/theros-booster-pack.png',
                    'is_admin'  => false
                )                
            )
        );
    }

}
?>