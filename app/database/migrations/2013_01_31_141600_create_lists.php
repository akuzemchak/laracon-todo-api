<?php

use Illuminate\Database\Migrations\Migration;

class CreateLists extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lists', function($table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('name');
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lists');
	}

}