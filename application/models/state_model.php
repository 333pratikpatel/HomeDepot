<?php
class state_model extends CI_Model 
{
	
	public function getState() 
	{
		$getData = $this->db->query('SELECT * FROM state ORDER BY state_name ASC');
		return $getData -> result();
		
	}

}
