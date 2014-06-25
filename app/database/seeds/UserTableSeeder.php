<?php

class UserTableSeeder extends Seeder{

	public function run(){

		DB::table('users')->delete();

		$user = User::create(array(
			'email' => 'admin@tiuna.com',
			'login' => 'Adakarina',
			'type' => 'administrator',
			'password' => Hash::make('432')
			)
		);

		$user = User::create(array(
			'email' => 'admin@tiuna.com',
			'login' => 'Alexis',
			'type' => 'administrator',
			'password' => Hash::make('123')
			)
		);

	}

}

?>