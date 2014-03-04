<?php
class city_model extends CI_Model 
{
	
	public function getCity($state=null) 
	{
		$getData = $this->db->query("SELECT * FROM city WHERE state_id = (SELECT state_id FROM state WHERE state_name LIKE '".$state."') ORDER BY city_name ASC");
		return $getData -> result();
		
	}
	public function getAllCity() 
	{
		$getData = $this->db->query('SELECT * FROM city ORDER BY city_name ASC');
		return $getData -> result();
	}

}
