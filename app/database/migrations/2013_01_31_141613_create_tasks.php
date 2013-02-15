<?php

use Illuminate\Database\Migrations\Migration;

class CreateTasks extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function($table)
		{
			$table->increments('id');
			$table->integer('list_id')->unsigned();
			$table->string('description');
			$table->boolean('completed');
			$table->timestamps();

			$table->foreign('list_id')->references('id')->on('lists')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tasks');
	}

}