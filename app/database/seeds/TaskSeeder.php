<?php

class TaskSeeder extends Seeder
{
	public function run()
	{
		$task1 = new Task;
		$task1->description = 'Do something';
		$task1->list_id = 1;
		$task1->save();

		$task2 = new Task;
		$task2->description = 'Do something else';
		$task2->list_id = 1;
		$task2->save();
	}
}