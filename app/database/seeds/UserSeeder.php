<?php

class UserSeeder extends Seeder
{
	public function run()
	{
		$user = new User;
		$user->username = 'admin';
		$user->password = 'admin';
		$user->save();
	}
}