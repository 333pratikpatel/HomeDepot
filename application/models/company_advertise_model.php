<?php
class company_advertise_model extends CI_Model 
{

	public function getData() 
	{
		$getData = $this->db->query('SELECT * FROM company_advertise');
		return $getData -> result();
	}

}
