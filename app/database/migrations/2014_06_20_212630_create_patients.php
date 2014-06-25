<?php

use Illuminate\Database\Migrations\Migration;

class CreatePatients extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('patients',function($table){
			$table->create();
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('passport');
			$table->string('phone_number');
			$table->string('emergency_number');
			$table->string('born_place');
			$table->date('born_date');
			$table->string('email');
			$table->string('status');
			$table->text('address');
			$table->string('representant_name');
			$table->string('representant_type');
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
		Schema::drop('patients');
	}

}