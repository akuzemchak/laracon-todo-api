<?php

class ListSeeder extends Seeder
{
	public function run()
	{
		$list = new TaskList;
		$list->name = 'My first list';
		$list->user_id = 1;
		$list->save();
	}
}