<?php

class Patient extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'patients';

	public function getPatientMeta(){
		return $this->hasMany('PatientMeta', 'patient_id');
	}
	
}