<?php

use Illuminate\Database\Migrations\Migration;

class CreatePatientmeta extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('patient_meta', function($table){
			$table->create();
			$table->increments('id');
			$table->integer('patient_id');
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
		Schema::drop('patient_meta');
	}

}