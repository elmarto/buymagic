<?php

class UserTableSeeder extends Seeder {

	public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert(
            array(
                array(
                    'email' 	=> 'juanito@test.com',
                    'password' 	=> 'asdfasdf',
                    'name' 		=> 'Juanito',
                    'lastname' 	=> 'Fernandez',
                    'avatarUrl' => 'img/products/theros-booster-pack.png'
                ),
                array(
                    'email' 	=> 'pablogimenez@test.com',
                    'password' 	=> 'asdfasdf',
                    'name' 		=> 'Pablo',
                    'lastname' 	=> 'Gimenez',
                    'avatarUrl' => 'img/products/theros-booster-pack.png'
                )
            )
        );
    }

}
?>