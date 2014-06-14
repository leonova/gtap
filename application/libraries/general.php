<?php  

class General{
	
	public function __construct() {
		parent::__construct();       
		
	}
	
	public function optionsBday(){
		$dob_day="";
		for ($day_value=1;$day_value<=31;$day_value++) {
			$dob_day.= '<option value="'.$day_value.'">'.$day_value.'</option>';
		}
		
		return $dob_day;
	}
	
	public function optionsByear(){
		$dob_yr="";
		for ($yr_value = 1920; $yr_value <= date("Y"); $yr_value++) {
			$dob_yr.= '<option value="'.$yr_value.'">'.$yr_value.'</option>';
		}
		
		return $dob_yr;
	}
}