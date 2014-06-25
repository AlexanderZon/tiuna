<?php

class PatientsController extends \BaseController {

	public function getIndex(){
		$patients = Patient::where('status', '=', 'active')->get();
		return View::make('patient.index')->with(array('patients'=>$patients));
	}

	public function getView($id = ''){
		if(empty($id)){
			return Redirect::to('/patient');
		}
		else{
			$patient = Patient::find($id);
			$metas = $patient->getPatientMeta()->get();
			$patientMetas = array(
				'blood_group' => '',
				'rh_factor' => '',
				'hernia' => array(),
				'allergy' => array(),
				'blood_pressure' => '',
				'fracture' => array(),
				'drunk_intake' => array(),
				'default' => array()
				);
			$herniaCounter = 0;
			$allergyCounter = 0;
			$blood_pressureCounter = 0;
			$fractureCounter = 0;
			$drug_intakeCounter = 0;
			$defaultCounter = 0;

			foreach($metas as $meta => $attribute):
				$value = $attribute['attributes'];
				switch($value['meta_key']){
					case 'blood_group':
						$patientMetas['blood_group'] = $value['meta_value'];
						break;
					case 'rh_factor':
						$patientMetas['rh_factor'] = $value['meta_value'];
						break;
					case 'hernia':
						$patientMetas['hernia'][$herniaCounter] = array(
							'description' => $value['meta_value'],
							'id' => $value['id']
							);
						$herniaCounter++;
						break;
					case 'allergy':
						$patientMetas['allergy'][$allergyCounter] = array(
							'description' => $value['meta_value'],
							'id' => $value['id']
							);
						$allergyCounter++;
						break;
					case 'blood_pressure':
						$patientMetas['blood_pressure'] = array(
							'description' => $value['meta_value'],
							'id' => $value['id']
							);
						break;
					case 'fracture':
						$patientMetas['fracture'][$fractureCounter] = array(
							'description' => $value['meta_value'],
							'id' => $value['id']
							);
						$fractureCounter++;
						break;
					case 'drug_intake':
						$patientMetas['drug_intake'][$drug_intakeCounter] = array(
							'description' => json_decode($value['meta_value']),
							'id' => $value['id']
							);
						$drug_intakeCounter++;
						break;
					default:
						$patientMetas['default'][$defaultCounter] = array(
							'description' => $value['meta_value'],
							'id' => $value['id']
							);
						$defaultCounter++;
						break;
					}
			endforeach;

			return View::make('patient.view')->with(array('patient'=>$patient, 'metas'=>$patientMetas));
		}
	}

	public function getCreate($id = ''){
		if(empty($id)){
			return View::make('patient.create');
		}
		else{
			return View::make('patient.createmetas')->with(array('id'=>$id));
		}
	}

	public function postCreate(){
		$patient = new Patient();
		$patient->first_name = Input::get('first_name');
		$patient->last_name = Input::get('last_name');
		$patient->passport = Input::get('passport');
		$patient->phone_number = Input::get('phone_number');
		$patient->emergency_number = Input::get('emergency_number');
		$patient->email = Input::get('email');
		$patient->born_place = Input::get('born_place');
		$patient->born_date = Input::get('born_date');
		$patient->status = 'active';
		$patient->address = Input::get('address');
		if(Input::get('representant_name') != ''):
			$patient->representant_name = Input::get('representant_name');
		endif;
		if(Input::get('representant_type') != ''):
			$patient->representant_type = Input::get('representant_type');
		endif;
		$patient->save();
		return View::make('patient.createmetas')->with(array('id'=>$patient->id));
	}

	public function postCreatemetas(){

		$patient = Input::get('id');

		$blood_group = new PatientMeta();
		$blood_group->patient_id = $patient;
		$blood_group->meta_key = 'blood_group';
		$blood_group->meta_value = Input::get('blood_group');
		$blood_group->save();

		$rh_factor = new PatientMeta();
		$rh_factor->patient_id = $patient;
		$rh_factor->meta_key = 'rh_factor';
		$rh_factor->meta_value = Input::get('rh_factor');
		$rh_factor->save();

		$hernias = Input::get('hernia');
		if(!empty($hernias)):
			foreach($hernias as $hernia):
				$temp = new PatientMeta();
				$temp->patient_id = $patient;
				$temp->meta_key = 'hernia';
				$temp->meta_value = $hernia;
				$temp->save();
				unset($temp);
			endforeach;
		endif;

		$allergy = Input::get('allergy');
		if(!empty($allergy)):
			$temp = new PatientMeta();
			$temp->patient_id = $patient;
			$temp->meta_key = 'allergy';
			$temp->meta_value = $allergy;
			$temp->save();
			unset($temp);
		endif;

		$fracture = Input::get('fracture');
		if(!empty($fracture)):
			$temp = new PatientMeta();
			$temp->patient_id = $patient;
			$temp->meta_key = 'fracture';
			$temp->meta_value = $fracture;
			$temp->save();
			unset($temp);
		endif;

		$blood_pressure = Input::get('blood_pressure');
		if($blood_pressure != 'null'):
			$temp = new PatientMeta();
			$temp->patient_id = $patient;
			$temp->meta_key = 'blood_pressure';
			$temp->meta_value = $blood_pressure;
			$temp->save();
			unset($temp);
		endif;

		$drug = Input::get('drug');
		if(!empty($drug)):
			$json = array(
				'drug' => $drug,
				'dose' => Input::get('dose'),
				'frecuency' => Input::get('frecuency')
				);
			$temp = new PatientMeta();
			$temp->patient_id = $patient;
			$temp->meta_key = 'drug_intake';
			$temp->meta_value = json_encode($json);
			$temp->save();
			unset($temp);
		endif;

		return Redirect::to('/patient');

	}

	public function getUpdate($id = ''){
		if(empty($id)){
			return Redirect::to('/patient');
		}
		else{
			$patient = Patient::find($id);
			return View::make('patient.update')->with(array('patient'=>$patient));
		}
	}

	public function postUpdate($id){
		if(empty($id)){
			return Redirect::to('/patient');
		}
		else{
			$patient = Patient::find($id);
			$patient->first_name = Input::get('first_name');
			$patient->last_name = Input::get('last_name');
			$patient->passport = Input::get('passport');
			$patient->phone_number = Input::get('phone_number');
			$patient->emergency_number = Input::get('emergency_number');
			$patient->email = Input::get('email');
			$patient->born_place = Input::get('born_place');
			$patient->born_date = Input::get('born_date');
			$patient->status = 'active';
			$patient->address = Input::get('address');
			if(Input::get('representant_name') != ''):
				$patient->representant_name = Input::get('representant_name');
			endif;
			if(Input::get('representant_type') != ''):
				$patient->representant_type = Input::get('representant_type');
			endif;
			$patient->save();
			return Redirect::to('/patient/view/'.$id);
		}
	}

	public function getDelete($id = ''){
		if(empty($id)){
			return "Hello getDelete EMPTY";
		}
		else{
			return "Hello getDelete NOTEMPTY";
		}
	}

	public function postDelete($id){

	}

	public function getActivate($id = ''){
		if(empty($id)){

		}
		else{
			$patient = Patient::find($id);
			$patient->status = 'active';
			$patient->save();
			return Redirect::to('/patient');
		}
	}

	public function getDesactivate($id = ''){
		if(empty($id)){

		}
		else{
			$patient = Patient::find($id);
			$patient->status = 'inactive';
			$patient->save();
			return Redirect::to('/patient');
		}
	}

	public function getActive(){
		$patients = Patient::where('status', '=', 'active')->get();
		return View::make('patient.index')->with(array('patients'=>$patients));
	}

	public function getInactive(){
		$patients = Patient::where('status', '=', 'inactive')->get();
		return View::make('patient.index')->with(array('patients'=>$patients));
	}

	public function getMayor(){
		$today = date('Y-m-d');
		$datetime = new DateTime($today);
		$patients = Patient::all();
		$array = array();
		$counter = 0;
		foreach($patients as $patient):
			$interval = $datetime->diff(new DateTime($patient->born_date));
			if($interval->format('%Y') >= 18 AND $patient->status == 'active'):
				$array[$counter] = $patient;
				$counter++;
			endif;
		endforeach;
		return View::make('patient.index')->with(array('patients'=>$array));
	}

	public function getMinor(){
		$today = date('Y-m-d');
		$datetime = new DateTime($today);
		$patients = Patient::all();
		$array = array();
		$counter = 0;
		foreach($patients as $patient):
			$interval = $datetime->diff(new DateTime($patient->born_date));
			if($interval->format('%Y') < 18 AND $patient->status == 'active'):
				$array[$counter] = $patient;
				$counter++;
			endif;
		endforeach;
		return View::make('patient.index')->with(array('patients'=>$array));
	}

	public function getJanuary(){
		$patients = Patient::all();
		$array = array();
		$counter = 0;
		foreach($patients as $patient):
			$date = date_format(new DateTime($patient->born_date), 'm');
			if($date == '01' AND $patient->status == 'active'):
				$array[$counter] = $patient;
				$counter++;
			endif;
		endforeach;
		return View::make('patient.index')->with(array('patients'=>$array));
	}

	public function getFebruary(){
		$patients = Patient::all();
		$array = array();
		$counter = 0;
		foreach($patients as $patient):
			$date = date_format(new DateTime($patient->born_date), 'm');
			if($date == '02' AND $patient->status == 'active'):
				$array[$counter] = $patient;
				$counter++;
			endif;
		endforeach;
		return View::make('patient.index')->with(array('patients'=>$array));
	}

	public function getMarch(){
		$patients = Patient::all();
		$array = array();
		$counter = 0;
		foreach($patients as $patient):
			$date = date_format(new DateTime($patient->born_date), 'm');
			if($date == '03' AND $patient->status == 'active'):
				$array[$counter] = $patient;
				$counter++;
			endif;
		endforeach;
		return View::make('patient.index')->with(array('patients'=>$array));
	}

	public function getApril(){
		$patients = Patient::all();
		$array = array();
		$counter = 0;
		foreach($patients as $patient):
			$date = date_format(new DateTime($patient->born_date), 'm');
			if($date == '04' AND $patient->status == 'active'):
				$array[$counter] = $patient;
				$counter++;
			endif;
		endforeach;
		return View::make('patient.index')->with(array('patients'=>$array));
	}

	public function getMay(){
		$patients = Patient::all();
		$array = array();
		$counter = 0;
		foreach($patients as $patient):
			$date = date_format(new DateTime($patient->born_date), 'm');
			if($date == '05' AND $patient->status == 'active'):
				$array[$counter] = $patient;
				$counter++;
			endif;
		endforeach;
		return View::make('patient.index')->with(array('patients'=>$array));
	}

	public function getJune(){
		$patients = Patient::all();
		$array = array();
		$counter = 0;
		foreach($patients as $patient):
			$date = date_format(new DateTime($patient->born_date), 'm');
			if($date == '06' AND $patient->status == 'active'):
				$array[$counter] = $patient;
				$counter++;
			endif;
		endforeach;
		return View::make('patient.index')->with(array('patients'=>$array));
	}

	public function getJuly(){
		$patients = Patient::all();
		$array = array();
		$counter = 0;
		foreach($patients as $patient):
			$date = date_format(new DateTime($patient->born_date), 'm');
			if($date == '07' AND $patient->status == 'active'):
				$array[$counter] = $patient;
				$counter++;
			endif;
		endforeach;
		return View::make('patient.index')->with(array('patients'=>$array));
	}

	public function getAugust(){
		$patients = Patient::all();
		$array = array();
		$counter = 0;
		foreach($patients as $patient):
			$date = date_format(new DateTime($patient->born_date), 'm');
			if($date == '08' AND $patient->status == 'active'):
				$array[$counter] = $patient;
				$counter++;
			endif;
		endforeach;
		return View::make('patient.index')->with(array('patients'=>$array));
	}

	public function getSeptember(){
		$patients = Patient::all();
		$array = array();
		$counter = 0;
		foreach($patients as $patient):
			$date = date_format(new DateTime($patient->born_date), 'm');
			if($date == '09' AND $patient->status == 'active'):
				$array[$counter] = $patient;
				$counter++;
			endif;
		endforeach;
		return View::make('patient.index')->with(array('patients'=>$array));
	}

	public function getOctober(){
		$patients = Patient::all();
		$array = array();
		$counter = 0;
		foreach($patients as $patient):
			$date = date_format(new DateTime($patient->born_date), 'm');
			if($date == '10' AND $patient->status == 'active'):
				$array[$counter] = $patient;
				$counter++;
			endif;
		endforeach;
		return View::make('patient.index')->with(array('patients'=>$array));
	}

	public function getNovember(){
		$patients = Patient::all();
		$array = array();
		$counter = 0;
		foreach($patients as $patient):
			$date = date_format(new DateTime($patient->born_date), 'm');
			if($date == '11' AND $patient->status == 'active'):
				$array[$counter] = $patient;
				$counter++;
			endif;
		endforeach;
		return View::make('patient.index')->with(array('patients'=>$array));
	}

	public function getDecember(){
		$patients = Patient::all();
		$array = array();
		$counter = 0;
		foreach($patients as $patient):
			$date = date_format(new DateTime($patient->born_date), 'm');
			if($date == '12' AND $patient->status == 'active'):
				$array[$counter] = $patient;
				$counter++;
			endif;
		endforeach;
		return View::make('patient.index')->with(array('patients'=>$array));
	}

	public function getSearch(){
		return Redirect::to('/patient');
	}

	public function postSearch(){

		$search = Input::get('search');
		$patients = Patient::where('first_name', 'LIKE', '%'.$search.'%')
			->orWhere('last_name', 'LIKE', '%'.$search.'%')
			->orWhere('passport', 'LIKE', '%'.$search.'%')
			->get();
		return View::make('patient.index')->with(array('patients'=>$patients));

	}

	public function getFracture($id = ''){
		if(empty($id)){
			return Redirect::to('/patient');
		}
		else{
			return View::make('patient.metas.fracture');
		}
	}

	public function getAllergy($id = ''){
		if(empty($id)){
			return Redirect::to('/patient');
		}
		else{
			return View::make('patient.metas.allergy');
		}
	}

	public function getHernia($id = ''){
		if(empty($id)){
			return Redirect::to('/patient');
		}
		else{
			return View::make('patient.metas.hernia');
		}
	}

	public function getDrug($id = ''){
		if(empty($id)){
			return Redirect::to('/patient');
		}
		else{
			return View::make('patient.metas.drug');
		}
	}

	public function postFracture($id = ''){
		if(empty($id)){
			return Redirect::to('/patient');
		}
		else{
			$meta = new PatientMeta();
			$meta->patient_id = $id;
			$meta->meta_key = 'fracture';
			$meta->meta_value = Input::get('fracture');
			$meta->save();
			return Redirect::to('/patient/view/'.$id);
		}
	}

	public function postAllergy($id = ''){
		if(empty($id)){
			return Redirect::to('/patient');
		}
		else{
			$meta = new PatientMeta();
			$meta->patient_id = $id;
			$meta->meta_key = 'allergy';
			$meta->meta_value = Input::get('allergy');
			$meta->save();
			return Redirect::to('/patient/view/'.$id);
		}
	}

	public function postHernia($id = ''){
		if(empty($id)){
			return Redirect::to('/patient');
		}
		else{
			$meta = new PatientMeta();
			$meta->patient_id = $id;
			$meta->meta_key = 'hernia';
			$meta->meta_value = Input::get('hernia');
			$meta->save();
			return Redirect::to('/patient/view/'.$id);
		}
	}

	public function postDrug($id = ''){
		if(empty($id)){
			return Redirect::to('/patient');
		}
		else{
			$json = array(
				'drug' => Input::get('drug'),
				'dose' => Input::get('dose'),
				'frecuency' => Input::get('frecuency')
				);
			$meta = new PatientMeta();
			$meta->patient_id = $id;
			$meta->meta_key = 'drug_intake';
			$meta->meta_value = json_encode($json);
			$meta->save();
			return Redirect::to('/patient/view/'.$id);
		}
	}

	public function getDeletemeta($id = ''){
		if(empty($id)){
			return Redirect::to('/patient');
		}
		else{
			$meta = PatientMeta::find($id);
			$patient = $meta->patient_id;
			PatientMeta::destroy($id);
			return Redirect::to('/patient/view/'.$patient);
		}
	}

}