<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsermetas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('usermeta', function($table){
			$table->create();
			$table->increments('id');
			$table->integer('user_id');
			$table->string('meta_key');
			$table->text('meta_value');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('usermeta');
	}

}