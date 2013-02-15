<?php

class DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call('UserTableSeeder');
	}
}

class UserTableSeeder extends Seeder
{
	public function run()
	{
		User::create(array(
			'username' => 'admin',
			'password' => 'admin',
		));
	}
}