<?php

class PatientMeta extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'patient_meta';

	public function patient(){
		return $this->belongsTo('Patient');
	}

}