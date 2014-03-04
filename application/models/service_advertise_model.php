<?php
class service_advertise_model extends CI_Model 
{

	public function getData($option) 
	{
		//$this->db->select('service_type');
			$getData = $this->db->query('SELECT * 
										FROM service_advertise 
										WHERE service_id = 
												 	(SELECT service_id
														FROM service_category WHERE service_type="'.$option.'")');
		return $getData -> result();
	}

}
